<?php
session_start();

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Validate CSRF token on POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF validation failed");
    }

    echo "Form submission successful and secure.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSRF Protection Demo</title>
</head>
<body>

<form method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input type="submit" value="Submit Secure Form">
</form>

</body>
</html>