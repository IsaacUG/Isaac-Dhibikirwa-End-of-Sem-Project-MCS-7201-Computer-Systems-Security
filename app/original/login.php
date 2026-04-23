<?php
// login.php (VULNERABLE VERSION)

// Database connection
$conn = mysqli_connect("localhost", "root", "", "vulnerable_app");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ❌ VULNERABILITY: SQL Injection
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $message = "Login successful! Welcome " . $username;
    } else {
        $message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Vulnerable App</title>
</head>
<body>

<h2>Login Page</h2>

<form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Login">
</form>

<p><?php echo $message; ?></p>

<br>
<a href="index.php">Back to Home</a>

</body>
</html>