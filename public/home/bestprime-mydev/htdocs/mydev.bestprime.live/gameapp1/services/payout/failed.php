<?php
// Get the transaction ID from the query parameter
$transaction_id = $_GET['transaction_id'] ?? null;

if (!$transaction_id) {
    echo "Error: No transaction ID provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Failed</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8d7da;
            color: #721c24;
            text-align: center;
            padding: 50px;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            padding: 30px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .error-title {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 700;
            color: #dc3545;
        }
        .error-message {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.5;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            color: #fff;
            background-color: #721c24;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }
        .button:hover {
            background-color: #5c161a;
            transform: translateY(-2px);
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="error-title">Transaction Failed</h1>
        <p class="error-message">We're sorry, but your transaction with ID <strong><?php echo htmlspecialchars($transaction_id); ?></strong> could not be processed. Please try again later or contact support if the issue persists.</p>
        <a href="/admin/secured/customer/pending/withdraw" class="button">Return to Home</a>
        <div class="footer">© <?php echo date("Y"); ?> lacy. All rights reserved.</div>
    </div>
</body>
</html>
