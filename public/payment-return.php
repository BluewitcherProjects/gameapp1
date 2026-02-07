<?php
session_start();
header('X-Frame-Options: ALLOWALL');
header('Content-Security-Policy: frame-ancestors *');

// Get order ID from query string or session
$order_id = $_GET['order_id'] ?? $_SESSION['last_order_id'] ?? null;
$redirect_url = $order_id 
    ? '/payment/processing/' . $order_id 
    : '/recharge/history';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Processing</title>
<script>
function redirectToApp() {
    var url = '<?php echo $redirect_url; ?>';
    if (window.top !== window.self) {
        window.top.location.href = url;
    } else {
        window.location.href = url;
    }
}

// Redirect after 1 second
setTimeout(redirectToApp, 1000);
</script>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .container {
        text-align: center;
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }
    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #667eea;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    h2 {
        color: #333;
        margin-bottom: 10px;
    }
    p {
        color: #666;
        margin-bottom: 20px;
    }
    a {
        color: #667eea;
        text-decoration: none;
        font-weight: bold;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<div class="container">
    <div class="spinner"></div>
    <h2>Payment Completed</h2>
    <p>Processing your transaction...</p>
    <p>Please wait, you will be redirected shortly.</p>
    <a href="<?php echo $redirect_url; ?>" onclick="redirectToApp(); return false;">
        Click here if not redirected automatically
    </a>
</div>
</body>
</html>
