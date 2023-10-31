<?php
session_start();

if (isset($_SESSION['email']) && $_SESSION['role'] === 'admin') {
    // Only admins can access this page
    echo "Welcome, Admin! You can manage roles here.";
    // Add role management functionality here
} else {
    echo "Access denied. Only admins can access this page.";
}