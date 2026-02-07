<?php

include('signapi.php');

// Configuration
$reqUrl = 'https://pay.qeawapay.com/pay/transfer';
$merchantKey = 'A9WXTQQQSMZCYPOHZAKQ8CSTIL9GC194';
$mch_id = '400033004';
$logFile = __DIR__ . '/transfer_logs.txt';

$mch_transferId = isset($_POST['trx']) ? $_POST['trx'] : null;
$bank_code = 'IDPT0001';
$receive_account = isset($_POST['account_number']) ? $_POST['account_number'] : null;
$receive_name = isset($_POST['account_name']) ? $_POST['account_name'] : null;
$transfer_amount = isset($_POST['amount']) ? $_POST['amount'] : null;
$remark = isset($_POST['ifsc_code']) ? $_POST['ifsc_code'] : null;
$back_url = 'https://sdbcharge-infsm.info/services/payout/qepay/callback.php';

$requestLogEntry = date('Y-m-d H:i:s') . " - POST Data: " . json_encode($_POST) . PHP_EOL;
file_put_contents($logFile, $requestLogEntry, FILE_APPEND);

if (!$mch_transferId || !$receive_account || !$receive_name || !$transfer_amount || !$remark) {
    $errorLogEntry = date('Y-m-d H:i:s') . " - Error: Missing required form fields." . PHP_EOL;
    file_put_contents($logFile, $errorLogEntry, FILE_APPEND);
    echo "Error: Missing required form fields.";
    exit;
}

$apply_date = date('Y-m-d H:i:s');
$sign_type = 'MD5';

$signStr = "apply_date={$apply_date}&back_url={$back_url}&bank_code={$bank_code}&mch_id={$mch_id}&mch_transferId={$mch_transferId}&receive_account={$receive_account}&receive_name={$receive_name}&remark={$remark}&transfer_amount={$transfer_amount}";

$sign = signapi::sign($signStr, $merchantKey);

$postdata = [
    'apply_date' => $apply_date,
    'back_url' => $back_url,
    'bank_code' => $bank_code,
    'mch_id' => $mch_id,
    'mch_transferId' => $mch_transferId,
    'receive_account' => $receive_account,
    'receive_name' => $receive_name,
    'remark' => $remark,
    'transfer_amount' => $transfer_amount,
    'sign_type' => $sign_type,
    'sign' => $sign
];

$queryString = http_build_query($postdata, '', '&', PHP_QUERY_RFC3986);
$response = signapi::http_post_res($reqUrl, $queryString);

$responseLogEntry = date('Y-m-d H:i:s') . " - Response: " . $response . PHP_EOL;
file_put_contents($logFile, $responseLogEntry, FILE_APPEND);

$responseData = json_decode($response, true);

$dbHost = 'localhost';
$dbUsername = 'newplan';
$dbPassword = 'newplan';
$dbName = 'newplan';

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($responseData['respCode']) && $responseData['respCode'] === 'SUCCESS') {
        $stmt = $conn->prepare("UPDATE withdrawals SET status = :status WHERE oid = :oid");
        $status = 'processing'; 
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':oid', $mch_transferId, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $rowsAffected = $stmt->rowCount();
            $updateLogEntry = date('Y-m-d H:i:s') . " - Status updated to processing for oid: {$mch_transferId} | Rows affected: {$rowsAffected}" . PHP_EOL;
            file_put_contents($logFile, $updateLogEntry, FILE_APPEND);

            header("Location: success.php?transaction_id=" . urlencode($mch_transferId));
        } else {
            $errorLogEntry = date('Y-m-d H:i:s') . " - Database error: Could not update status for oid: {$mch_transferId}" . PHP_EOL;
            file_put_contents($logFile, $errorLogEntry, FILE_APPEND);
            header("Location: failed.php?error_msg=" . urlencode('Database error.') . "&transaction_id=" . urlencode($mch_transferId));
        }
    } else {
        $errorMsg = isset($responseData['errorMsg']) ? $responseData['errorMsg'] : 'Transaction failed due to an unknown error.';
        $errorLogEntry = date('Y-m-d H:i:s') . " - Transaction failed: " . $errorMsg . PHP_EOL;
        file_put_contents($logFile, $errorLogEntry, FILE_APPEND);
        header("Location: failed.php?error_msg=" . urlencode($errorMsg) . "&transaction_id=" . urlencode($mch_transferId));
    }
} catch (PDOException $e) {
    $errorLogEntry = date('Y-m-d H:i:s') . " - PDO Error: " . $e->getMessage() . PHP_EOL;
    file_put_contents($logFile, $errorLogEntry, FILE_APPEND);
    die("Connection failed: " . $e->getMessage());
}

?>
