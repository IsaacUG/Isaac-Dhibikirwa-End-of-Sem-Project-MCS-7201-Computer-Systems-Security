<?php
require_once "secure_config.php";

$message = "";

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // CSRF protection
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF validation failed.");
    }

    // Input validation
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepared statement (prevents SQL Injection)
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Password verification
        if (password_verify($password, $row['password'])) {
            $message = "Login successful! Welcome " . htmlspecialchars($username);
        } else {
            $message = "Invalid username or password";
        }
    } else {
        $message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Login</title>
</head>
<body>

<h2>Secure Login Page</h2>

<form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <!-- CSRF Token -->
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

    <input type="submit" value="Login">
</form>

<p><?php echo htmlspecialchars($message); ?></p>

<br>
<a href="index.php">Back to Home</a>

</body>
</html>