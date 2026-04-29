<?php
// Demonstrates secure SQL handling using prepared statements

$conn = new mysqli("localhost", "root", "", "vulnerable_app");

if ($conn->connect_error) {
    die("Connection failed");
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Prepared statement (prevents SQL Injection)
$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        echo "Login successful";
    } else {
        echo "Invalid credentials";
    }
} else {
    echo "User not found";
}
?>