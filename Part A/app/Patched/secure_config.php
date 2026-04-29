<?php
// secure_config.php

// Start secure session
session_start();

// Regenerate session ID to prevent fixation
session_regenerate_id(true);

// Secure session settings
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS
ini_set('session.use_strict_mode', 1);

// Security Headers
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'");

// Database connection
$conn = new mysqli("localhost", "root", "", "vulnerable_app");

if ($conn->connect_error) {
    die("Database connection failed.");
}
?>