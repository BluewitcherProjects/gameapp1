<?php
header("Content-Type: text/html; charset=UTF-8");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__ . '/db.php';

// Get active payment gateway
$stmt = $conn->prepare("SELECT * FROM payment_methods WHERE status = 'active' AND auto = 1 LIMIT 1");
$stmt->execute();
$active_gateway = $stmt->fetch();

if (!$active_gateway) {
    die(json_encode(['status' => 0, 'message' => 'No active payment gateway found']));
}

$gateway_tag = $active_gateway['tag'];
$gateway_settings = json_decode($active_gateway['settings'], true);

// Detect base URL - check for proxy headers too
$is_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
         || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
         || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
$base_url = ($is_https ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

// Gateway-specific configuration
if ($gateway_tag === 'hxpayment') {
    $api_url = $gateway_settings['api_url']['value'] ?? 'https://hxpayment.net';
    $merchantLogin = $gateway_settings['merchantLogin']['value'] ?? '';
    $merchant_key = $gateway_settings['merchant_key']['value'] ?? '';
    $order_id = 'HX' . time() . rand(1000, 9999);
    $notify_url = $base_url . "/ipn/hxpayment/in";
    $customer_name = $gateway_settings['customer_name']['value'] ?? 'Customer';
    $customer_email = $gateway_settings['customer_email']['value'] ?? 'customer@example.com';
    $customer_phone = $gateway_settings['customer_phone']['value'] ?? '919999999999';
} elseif ($gateway_tag === 'watchpay') {
    $merchant_key = "dea314adf60e448e9d52c8ddb632f313";
    $version = "1.0";
    $mch_id = "100666793";
    $notify_url = $base_url . "/services/callback.php";
    $page_url = $base_url . "/payment-return.php";
    $order_id = 'WP' . '2026' . time();
    $pay_type = "101";
    $goods_name = "Deposit";
    $sign_type = "MD5";
} else {
    die(json_encode(['status' => 0, 'message' => 'Unsupported payment gateway: ' . $gateway_tag]));
}

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

    // Prepare API request based on gateway
    if ($gateway_tag === 'hxpayment') {
        // HXPayment API
        $requestBody = [
            "merchantLogin" => $merchantLogin,
            "orderCode" => $order_id,
            "amount" => floatval($trade_amount),
            "name" => $customer_name,
            "email" => $customer_email,
            "phone" => $customer_phone,
            "remark" => 'Order ' . $order_id
        ];

        // Build sign for HXPayment
        ksort($requestBody);
        $signString = '';
        foreach ($requestBody as $key => $value) {
            if ($value !== '' && $value !== null) {
                if ($signString !== '') {
                    $signString .= '&';
                }
                $signString .= $key . '=' . $value;
            }
        }
        $signString .= '&key=' . $merchant_key;
        $requestBody['sign'] = md5($signString);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url . "/payment/collection");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Debug logging
        file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] HXPayment Request Data: " . json_encode($requestBody) . "\n", FILE_APPEND);
        file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] Sign String: $signString\n", FILE_APPEND);
        file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] API Response (HTTP $http_code): $response\n", FILE_APPEND);

        $response_data = json_decode($response, true);
        
        if (json_last_error() === JSON_ERROR_NONE && isset($response_data['paymentUrl'])) {
            $pay_link = htmlspecialchars($response_data['paymentUrl']);
            $method_name = "HXPayment";
            $platform_order_code = $response_data['platformOrderCode'] ?? $order_id;
        } else {
            die(json_encode(['status' => 0, 'message' => 'Unexpected HXPayment response format.', 'debug_response' => $response, 'http_code' => $http_code]));
        }

    } elseif ($gateway_tag === 'watchpay') {
        // WatchPay API
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

        // Debug logging
        file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] WatchPay Request Data: " . json_encode($postdata) . "\n", FILE_APPEND);
        file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] Sign String: $signStr&key=$merchant_key\n", FILE_APPEND);
        file_put_contents(__DIR__ . '/transaction_logs.txt', "[" . date('Y-m-d H:i:s') . "] API Response (HTTP $http_code): $response\n", FILE_APPEND);

        $response_data = json_decode($response, true);

        if (json_last_error() === JSON_ERROR_NONE && isset($response_data['payInfo'])) {
            $pay_link = htmlspecialchars($response_data['payInfo']);
            $method_name = "Watchpay";
            $platform_order_code = $order_id;
        } else {
            die(json_encode(['status' => 0, 'message' => 'Unexpected WatchPay response format.', 'debug_response' => $response, 'http_code' => $http_code]));
        }
    }

    // Insert deposit record
    $status = "pending";
    $stmt = $conn->prepare("INSERT INTO deposits 
        (user_id, method_name, order_id, transaction_id, amount, charge_amount, final_amount, date, status, created_at, updated_at) 
        VALUES (?, ?, ?, ?, ?, 0.00, ?, ?, ?, NOW(), NOW())");

    $stmt->execute([
        $user_id,
        $method_name,
        $order_id,
        $platform_order_code,
        $trade_amount,
        $trade_amount,
        $display_date,
        $status
    ]);

    // Store order ID in session for return page
    session_start();
    $_SESSION['last_order_id'] = $order_id;

    header("Location: $pay_link");
    exit;

} catch (PDOException $e) {
    die(json_encode(['status' => 0, 'message' => 'Database error!']));
}
?>
