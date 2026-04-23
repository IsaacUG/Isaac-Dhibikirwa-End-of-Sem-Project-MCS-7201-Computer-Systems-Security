<?php
// Demonstrates protection against Cross-Site Scripting (XSS)

$input = $_GET['input'] ?? '';

// Output encoding
$safe_output = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html>
<head>
    <title>XSS Protection Demo</title>
</head>
<body>

<h3>User Input:</h3>
<p><?php echo $safe_output; ?></p>

</body>
</html>