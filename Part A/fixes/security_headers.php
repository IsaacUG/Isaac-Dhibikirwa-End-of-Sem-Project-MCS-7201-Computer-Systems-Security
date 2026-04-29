<?php
// Implements security headers to protect against common attacks

header("X-Frame-Options: DENY"); // Prevent clickjacking
header("X-Content-Type-Options: nosniff"); // Prevent MIME sniffing
header("X-XSS-Protection: 1; mode=block"); // XSS protection (legacy)
header("Content-Security-Policy: default-src 'self'"); // Restrict resources

echo "Security headers applied successfully.";
?>