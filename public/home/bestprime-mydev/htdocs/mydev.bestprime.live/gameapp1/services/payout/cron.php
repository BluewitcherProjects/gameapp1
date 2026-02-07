<?php
// Database configuration
$servername = "localhost";
$username = "newplan";
$password = "newplan";
$dbname = "newplan";

// API configuration
$reqUrl = 'https://pay.qeawapay.com/query/transfer';
$merchantKey = 'A9WXTQQQSMZCYPOHZAKQ8CSTIL9GC194';
$mch_id = '400033004';
$sign_type = 'MD5';

function generate_signature($signStr, $merchantKey) {
    return md5($signStr . '&key=' . $merchantKey);
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$stmt = $conn->prepare("SELECT id, user_id, final_amount, amount, oid, status FROM withdrawals WHERE status IN ('pending', 'processing')");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    foreach ($result as $row) {
        $mch_transferId = $row['oid'];
        $user_id = $row['user_id'];
        $amount = $row['amount'];
        $status = $row['status'];
        $total = $amount;

        $signStr = "mch_id=$mch_id&mch_transferId=$mch_transferId";
        $sign = generate_signature($signStr, $merchantKey);

        $postdata = [
            'mch_id' => $mch_id,
            'mch_transferId' => $mch_transferId,
            'sign_type' => $sign_type,
            'sign' => $sign
        ];

        // Initialize cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $reqUrl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postdata));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === false) {
            curl_close($ch);
            continue;
        }

        $response_data = json_decode($response, true);
        curl_close($ch);

        if (isset($response_data['respCode']) && isset($response_data['tradeResult'])) {
            $respCode = $response_data['respCode'];
            $tradeResult = $response_data['tradeResult'];

            if ($respCode === 'SUCCESS') {
                if ($tradeResult == 1) { 
                    $update_stmt = $conn->prepare("UPDATE withdrawals SET status = 'approved', updated_at = NOW() WHERE id = :id");
                    $update_stmt->bindParam(':id', $row['id']);
                    $update_stmt->execute();
                } elseif ($tradeResult == 2) { 
                    $conn->beginTransaction();
                    try {
                        $update_stmt = $conn->prepare("UPDATE withdrawals SET status = 'rejected', updated_at = NOW() WHERE id = :id");
                        $update_stmt->bindParam(':id', $row['id']);
                        $update_stmt->execute();

                        $refund_stmt = $conn->prepare("UPDATE users SET balance = balance + :total WHERE id = :user_id");
                        $refund_stmt->bindParam(':total', $total);
                        $refund_stmt->bindParam(':user_id', $user_id);
                        $refund_stmt->execute();

                        $conn->commit();
                    } catch (Exception $e) {
                        $conn->rollBack();
                    }
                }
            }
        }
    }
}

$conn = null;
?>
