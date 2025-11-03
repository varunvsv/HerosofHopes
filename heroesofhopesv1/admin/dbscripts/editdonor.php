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
    $did = $_POST['did'];

    $sql = "UPDATE donors SET fname='$fname', lname='$lname', email='$email', age='$age', 
    mno='$mno', gender='$gender', bgroup='$bgroup', msg='$message' WHERE id=$did";


    if ($conn->query($sql) === TRUE) {

        $msg = "Donor Updated successfully.";
        header("location: ../forms/manageDonor.php");
    } else {
        $msg = "Error" . $sql . "<br>" . $conn->error;

        $_SESSION['msg'] = $msg;
        echo $msg;
        header("location: ../forms/manageDonor.php");
    }

    $conn->close();
}
