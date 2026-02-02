<?php
header('X-Frame-Options: ALLOWALL');
header('Content-Security-Policy: frame-ancestors *');
?>
<!DOCTYPE html>
<html>
<head>
<script>
if (window.top !== window.self) {
    window.top.location.href = '/recharge/history';
} else {
    window.location.href = '/recharge/history';
}
</script>
</head>
<body>
<p>Payment completed. Redirecting...</p>
<a href="/recharge/history">Click here if not redirected</a>
</body>
</html>
