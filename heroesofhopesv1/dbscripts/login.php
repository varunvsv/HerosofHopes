<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);



    $sql = "SELECT * FROM users WHERE email = '$username' and password = '$password' ";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        header("location: ../forms/index.php");
    } else {
        $_SESSION['msg'] = "Invalid Username or Password.";
        //$error = "Invalid password.";
        header("location: ../forms/login.php");
    }
} else {
    $error = "No account found with that username.";
    echo "Else";
}


$conn->close();
