<?php
session_start();
require_once('config.php'); // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT user_id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        if ($password == $hashed_password) {
            // Authentication successful
            echo "valid password";
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header('location: index.php');
        } else {
            echo "Invalid password. <a href='login.php'>Back to Login</a>";
        }
    } else {
        echo "Username not found. <a href='register.php'>Sign Up</a>";
    }

    $stmt->close();
}

$mysqli->close();
?>
