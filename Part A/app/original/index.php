<?php
// index.php (VULNERABLE VERSION)
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vulnerable Web App</title>
</head>
<body>

<h2>Welcome to the Vulnerable Web Application</h2>

<!-- Simple search feature (XSS vulnerable) -->
<form method="GET" action="">
    <label>Search:</label>
    <input type="text" name="query">
    <input type="submit" value="Search">
</form>

<hr>

<?php
// VULNERABILITY: Reflected XSS
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    echo "<h3>Search Results for: " . $query . "</h3>";
}
?>

<hr>

<!-- Navigation -->
<a href="login.php">Login Page</a>

</body>
</html>