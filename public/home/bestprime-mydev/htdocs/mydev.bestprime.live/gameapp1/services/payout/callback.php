<?php

header("Content-Type: application/json; charset=UTF-8");

$log_file = __DIR__ . '/transaction_logs.txt';

function logToFile($log_file, $message) {
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($log_file, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

$servername = "localhost";
$username = "mubarak_demo1";
$password = "mubarak_demo1";
$dbname = "mubarak_demo1";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    logToFile($log_file, "Database connection failed: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(["error" => "Database connection error"]);
    exit;
}

$data = $_POST;
logToFile($log_file, "Request Data: " . json_encode($data));

$tradeResult = $data['tradeResult'] ?? '';
$merTransferId = $data['merTransferId'] ?? '';
$transferAmount = $data['transferAmount'] ?? '';
$merNo = $data['merNo'] ?? '';
$tradeNo = $data['tradeNo'] ?? '';
$applyDate = $data['applyDate'] ?? '';
$respCode = $data['respCode'] ?? '';

try {
    $pdo->beginTransaction();

    logToFile($log_file, "Checking withdrawal record for order_id: $merTransferId");

    $stmt = $pdo->prepare("SELECT * FROM withdrawals WHERE oid = :oid FOR UPDATE");
    $stmt->execute([':oid' => $merTransferId]);
    $withdrawal = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($withdrawal) {
        logToFile($log_file, "Withdrawal record found for order_id: $merTransferId, current status: " . $withdrawal['status']);

        if ($withdrawal['status'] === 'processing') {  
            logToFile($log_file, "Withdrawal status is 'processing'. Processing update.");

            if ($tradeResult === '1' && $respCode === 'SUCCESS') { 
                logToFile($log_file, "Updating withdrawal to 'approved' for order_id: $merTransferId");

                $stmt = $pdo->prepare("UPDATE withdrawals SET status = 'approved', transaction_id = :tradeNo WHERE oid = :order_id");
                $stmt->execute([':tradeNo' => $tradeNo, ':order_id' => $merTransferId]);

            } else { 
                logToFile($log_file, "Trade result is failure. Updating withdrawal to 'rejected' for order_id: $merTransferId");

                $stmt = $pdo->prepare("UPDATE withdrawals SET status = 'approved' WHERE oid = :order_id");
                $stmt->execute([':order_id' => $merTransferId]);

                $userId = $withdrawal['user_id']; 
                $refundAmount = $withdrawal['amount'];

                logToFile($log_file, "Refunding amount ₹$refundAmount to user ID: $userId");

                $stmt = $pdo->prepare("UPDATE users SET balance = balance + :amount WHERE id = :user_id");
                $stmt->execute([':amount' => $refundAmount, ':user_id' => $userId]);

                logToFile($log_file, "Refund successful to user ID: $userId");
                logToFile($log_file, "Withdrawal rejected for order_id: $merTransferId");
            }

            $pdo->commit();
            echo json_encode(["success" => "Status updated successfully"]);
        } else {
            echo json_encode(["error" => "Withdrawal status is not processing."]);
        }
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Withdrawal record not found"]);
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    logToFile($log_file, "Database update failed: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(["error" => "Database update error"]);
} catch (Exception $e) {
    $pdo->rollBack();
    logToFile($log_file, "Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}

?>
