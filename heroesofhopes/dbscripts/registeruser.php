<?php

include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mno = $_POST['mno'];
    $password = $_POST['password'];
    // $hlogo = $_POST['hlogo'];


    $sql = "INSERT INTO users (name, email, mobile,password) 
    VALUES ('$fname','$email', '$mno','$password')";

    if ($conn->query($sql) === TRUE) {

        $msg = "Registration successfully.";
        $_SESSION['msg'] = $msg;
        header("location: ../forms/login.php");
    } else {
        $msg = "Error" . $sql . "<br>" . $conn->error;
        $_SESSION['msg'] = $msg;
        header("location: ../forms/register.php");
    }

    $conn->close();
}
