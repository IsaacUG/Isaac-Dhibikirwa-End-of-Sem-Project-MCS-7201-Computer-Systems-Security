<?php
// Demonstrates proper input validation & sanitization

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (!$email) {
    echo "Invalid email format";
} else {
    echo "Valid input received:<br>";
    echo "Username: " . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . "<br>";
    echo "Email: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
}
?>