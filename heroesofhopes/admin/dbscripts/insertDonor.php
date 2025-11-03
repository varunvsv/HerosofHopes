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

        $msg = "Added successfully.";
        $_SESSION['msg'] = $msg;
        header("location: ../forms/addDonor.php");
    } else {
        $msg = "Error" . $sql . "<br>" . $conn->error;
        $_SESSION['msg'] = $msg;
        header("location: ../forms/addDonor.php");
    }

    $conn->close();
}
