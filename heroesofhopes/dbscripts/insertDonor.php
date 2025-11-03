<?php

include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $mno = $_POST['mno'];
    $gender = $_POST['gender'];
    $bgroup = $_POST['bgroup'];
    $message = $_POST['message'];
    // $hlogo = $_POST['hlogo'];


    $sql = "INSERT INTO donors (fname, lname, email, age, mno,gender,bgroup,msg) 
    VALUES ('$fname','$lname','$email','$age', '$mno','$gender','$bgroup','$message')";

    if ($conn->query($sql) === TRUE) {
        $message = "Request Send";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $msg = "Request Send";
        $_SESSION['msg'] = $msg;
        header("location: ../forms/donaterequest.php");
    } else {
        $msg = "Error" . $sql . "<br>" . $conn->error;
        echo "<script type='text/javascript'>alert('$msg');</script>";
        $_SESSION['msg'] = $msg;
        header("location: ../forms/donaterequest.php");
    }

    $conn->close();
}
