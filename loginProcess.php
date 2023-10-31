<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = unserialize(file_get_contents('users.txt'));

    if ($users) {
        foreach ($users as $user) {
            if ($user['email'] === $email && password_verify($password, $user['password'])) {
                // Authentication successful, set session data
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];

                // Redirect to different pages based on the user's role
                if ($user['role'] === 'admin') {
                    header('Location: admin_dashboard.php');
                } elseif ($user['role'] === 'manager') {
                    header('Location: manager_dashboard.php');
                } else {
                    header('Location: user_dashboard.php');
                }

                exit();
            }
        }
    }

    // Authentication failed, redirect back to login page with an error
    header('Location: login.php?error=1');
}