<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

   

    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required. <a href='index.php'>Go back</a>";
    } else {
        
        $userData = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => 'user', 
        ];

        
        $users = unserialize(file_get_contents('users.txt'));
        $users[] = $userData;
        file_put_contents('users.txt', serialize($users));

        
        header('Location: login.php');
    }
}