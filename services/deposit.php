<?php
header("Content-Type: text/html; charset=UTF-8");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php'; 

$merchant_key = "dea314adf60e448e9d52c8ddb632f313";
$version = "1.0";
$mch_id = "100666793";
$notify_url = "http://127.0.0.1:8000/ipn/watchpay/in";
$page_url = "http://127.0.0.1:8000/deposit";
$order_id = 'WP' . '2026' . time();
$pay_type = "101";
$goods_name = "Deposit";
$sign_type = "MD5";

$username = isset($_POST['user']) ? trim($_POST['user']) : (isset($_GET['user']) ? trim($_GET['user']) : '');
$amount   = isset($_POST['amount']) ? trim($_POST['amount']) : (isset($_GET['amount']) ? trim($_GET['amount']) : '');

if ($amount === '' || !is_numeric($amount) || $amount <= 0) {
    die(json_encode(['status' => 0, 'message' => 'Invalid amount']));
}

$trade_amount  = number_format((float)$amount, 2, '.', '');
$order_date    = date("Y-m-d H:i:s");
$display_date  = date("d-m-Y H:i:s");

try {
    
    $stmt = $conn->prepare("SELECT id FROM users WHERE phone = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user) {
        die(json_encode(['status' => 0, 'message' => 'User not found']));
    }

    $user_id = $user['id'];

    $signStr = "goods_name=$goods_name&mch_id=$mch_id&mch_order_no=$order_id&notify_url=$notify_url&order_date=$order_date&page_url=$page_url&pay_type=$pay_type&trade_amount=$trade_amount&version=$version";
    $sign    = md5($signStr . "&key=" . $merchant_key);

    $postdata = [
        'goods_name'   => $goods_name,
        'mch_id'       => $mch_id,
        'mch_order_no' => $order_id,
        'notify_url'   => $notify_url,
        'order_date'   => $order_date,
        'page_url'     => $page_url,
        'pay_type'     => $pay_type,
        'trade_amount' => $trade_amount,
        'version'      => $version,
        'sign_type'    => $sign_type,
        'sign'         => $sign
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.watchglb.com/pay/web");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postdata));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Debug: log request and response
    file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] Request Data: " . json_encode($postdata) . "\n", FILE_APPEND);
    file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] Sign String: $signStr&key=$merchant_key\n", FILE_APPEND);
    file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] API Response (HTTP $http_code): $response\n", FILE_APPEND);
    if ($curl_error) {
        file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] cURL Error: $curl_error\n", FILE_APPEND);
    }

    $response_data = json_decode($response, true);

    if (json_last_error() === JSON_ERROR_NONE && isset($response_data['payInfo'])) {
        $pay_link    = htmlspecialchars($response_data['payInfo']);
        $method_name = "Watchpay";
        $status      = "pending";

        $stmt = $conn->prepare("INSERT INTO deposits 
            (user_id, method_name, order_id, transaction_id, amount, charge_amount, final_amount, date, status, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, 0.00, ?, ?, ?, NOW(), NOW())");

        $stmt->execute([
            $user_id,
            $method_name,
            $order_id,
            $order_id,
            $trade_amount,
            $trade_amount,
            $display_date,
            $status
        ]);

        header("Location: $pay_link");
        exit;
    } else {
        die(json_encode(['status' => 0, 'message' => 'Unexpected response format.', 'debug_response' => $response, 'http_code' => $http_code, 'curl_error' => $curl_error]));
    }

} catch (PDOException $e) {
    die(json_encode(['status' => 0, 'message' => 'Database error!']));
}
?>
