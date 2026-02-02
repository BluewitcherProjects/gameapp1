<?php
header('X-Frame-Options: ALLOWALL');
header('Content-Security-Policy: frame-ancestors *');
?>
<!DOCTYPE html>
<html>
<head>
<script>
if (window.top !== window.self) {
    window.top.location.href = '/deposit';
} else {
    window.location.href = '/deposit';
}
</script>
</head>
<body>
<p>Payment completed. Redirecting...</p>
<a href="/deposit">Click here if not redirected</a>
</body>
</html>
