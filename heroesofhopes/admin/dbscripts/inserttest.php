<?php

include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tname = $_POST['tname'];
    $ptdesc = $_POST['ptdesc'];
    $dtime = $_POST['dtime'];
    $dpost = $_POST['dpost'];
    $price = $_POST['price'];
    $content = $_POST['content'];



    $sql = "INSERT INTO bloodtests (btname, preInfo, deliverytime, description, price) 
    VALUES ('$tname','$ptdesc','$dtime.' '.$dpost','$content','$price')";

    if ($conn->query($sql) === TRUE) {

        $msg = "Added successfully.";
        $_SESSION['msg'] = $msg;
        header("location: ../forms/addtest.php");
    } else {
        $msg = "Error" . $sql . "<br>" . $conn->error;
        $_SESSION['msg'] = $msg;
        header("location: ../forms/addtest.php");
    }

    $conn->close();
}
