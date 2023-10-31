<?php
session_start();

if (isset($_SESSION['email']) && $_SESSION['role'] === 'manager') {
    echo "Welcome, Manager! This is your dashboard.";
    // Add manager-specific functionality here
} else {
    echo "Access denied. Only managers can access this page.";
}