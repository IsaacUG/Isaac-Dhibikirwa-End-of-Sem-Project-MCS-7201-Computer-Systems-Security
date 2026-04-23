<?php
// Prevents path traversal using whitelist validation

$allowed_pages = ['home.php', 'about.php', 'contact.php'];

$page = $_GET['page'] ?? 'home.php';

if (in_array($page, $allowed_pages)) {
    include("pages/" . $page);
} else {
    echo "Access denied.";
}
?>