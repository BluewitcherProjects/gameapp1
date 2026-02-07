<!-- success.php -->
<?php
// Get the transaction ID from the URL parameter
$transactionId = isset($_GET['transaction_id']) ? htmlspecialchars($_GET['transaction_id']) : 'Unknown';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Success</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }
        .container {
            max-width: 600px;
            width: 90%;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(40,167,69,0.1) 20%, transparent 60%);
            z-index: 0;
            opacity: 0.2;
        }
        .icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 20px;
            z-index: 1;
        }
        h1 {
            font-size: 32px;
            color: #333;
            margin: 0;
            z-index: 1;
        }
        p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
            z-index: 1;
        }
        .transaction-id {
            font-weight: bold;
            color: #007bff;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
            z-index: 1;
        }
        .countdown {
            font-size: 16px;
            color: #888;
            margin-top: 20px;
            z-index: 1;
        }
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #0056b3;
        }
        @media (max-width: 600px) {
            .icon {
                font-size: 60px;
            }
            h1 {
                font-size: 24px;
            }
            p, .countdown {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">&#10004;</div>
        <h1>Transaction Successful!</h1>
        <p>Your transaction has been completed successfully.</p>
        <p>Transaction ID: <span class="transaction-id"><?php echo $transactionId; ?></span></p>
        <div class="countdown">
            You will be redirected to the home page in <span id="countdown">8</span> seconds.
        </div>
        <div class="footer">
            Thank you for your business! If you have any questions, feel free to <a href="/admin/secured/customer/pending/withdraw">contact us</a>.
        </div>
    </div>
    <script>
        // Countdown timer logic
        let countdown = 6;
        const countdownElement = document.getElementById('countdown');
        
        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            if (countdown <= 0) {
                clearInterval(interval);
                window.location.href = "/admin/secured/customer/pending/withdraw"; // Replace with your home page URL
            }
        }, 1000);
    </script>
</body>
</html>
