<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);



    $sql = "SELECT  email, pass FROM admin WHERE email = '$username' and pass = '$password' ";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        header("location: ../forms/adminHome.php");
    } else {
        $_SESSION['error'] = "Invalid Username or Password.";
        //$error = "Invalid password.";
        header("location:../index.php");
    }
} else {
    $error = "No account found with that username.";
    echo "Else";
}


$conn->close();
