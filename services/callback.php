<?php

header("Content-Type: application/json; charset=UTF-8");

$log_file = __DIR__ . '/transaction_logs.txt';

function logToFile($log_file, $message) {
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($log_file, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "game1";

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
$oriAmount = $data['oriAmount'] ?? '';
$amount = $data['amount'] ?? '';
$mchId = $data['mchId'] ?? '';
$orderNo = $data['orderNo'] ?? '';
$mchOrderNo = $data['mchOrderNo'] ?? '';
$orderDate = $data['orderDate'] ?? '';

try {
    $pdo->beginTransaction();

    logToFile($log_file, "Checking deposit record for order_id: $mchOrderNo");

    $stmt = $pdo->prepare("SELECT * FROM deposits WHERE order_id = :order_id FOR UPDATE");
    $stmt->execute([':order_id' => $mchOrderNo]);
    $deposit = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($deposit) {
        logToFile($log_file, "Deposit record found for order_id: $mchOrderNo, current status: " . $deposit['status']);

        if ($deposit['status'] === 'pending') {  
            
            logToFile($log_file, "Deposit status is 'pending'. Processing update.");

            $amount = floatval($amount);  

            if ($tradeResult === '1') { 
                logToFile($log_file, "Updating deposit to 'approved' for order_id: $mchOrderNo");

                $stmt = $pdo->prepare("UPDATE deposits SET status = 'approved', amount = :amount WHERE order_id = :order_id");
                $stmt->execute([
                    ':amount' => $amount,
                    ':order_id' => $mchOrderNo
                ]);

                $user_id = $deposit['user_id'];
                $stmt = $pdo->prepare("UPDATE users SET balance = balance + :amount WHERE id = :user_id");
                $stmt->execute([
                    ':amount' => $amount,
                    ':user_id' => $user_id
                ]);

                logToFile($log_file, "User balance updated successfully for user_id: $user_id");

            } else { 
                logToFile($log_file, "Trade result is failure. Updating deposit to 'rejected' for order_id: $mchOrderNo");

                $stmt = $pdo->prepare("UPDATE deposits SET status = 'rejected' WHERE order_id = :order_id");
                $stmt->execute([':order_id' => $mchOrderNo]);

                logToFile($log_file, "Deposit rejected for order_id: $mchOrderNo");
            }

            $pdo->commit();
            echo json_encode(["success" => "Deposit updated successfully"]);
        } else {
            logToFile($log_file, "Deposit status is not 'pending' for order_id: $mchOrderNo. Current status: " . $deposit['status']);
            echo json_encode(["error" => "Deposit status is not pending."]);
        }
    } else {
        logToFile($log_file, "Deposit record not found for order_id: $mchOrderNo");
        http_response_code(404);
        echo json_encode(["error" => "Deposit record not found"]);
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
