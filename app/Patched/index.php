<?php
require_once "secure_config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Web App</title>
</head>
<body>

<h2>Welcome to the Secure Web Application</h2>

<form method="GET" action="">
    <label>Search:</label>
    <input type="text" name="query">
    <input type="submit" value="Search">
</form>

<hr>

<?php
if (isset($_GET['query'])) {
    // Sanitize input
    $query = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8');

    echo "<h3>Search Results for: " . $query . "</h3>";
}
?>

<hr>

<a href="login.php">Login Page</a>

</body>
</html>