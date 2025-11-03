<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the image path to delete the file from server
    $query = "SELECT image FROM medicines WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $image_path = "../uploads/medicines/" . $row['image'];

    // Delete medicine from the database
    $sql = "DELETE FROM medicines WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        // Delete the image file
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $_SESSION['msg'] = "Medicine deleted successfully!";
        header("Location: ../forms/managemedicines.php");
    } else {
        $_SESSION['msg'] = "Error deleting medicine: " . mysqli_error($conn);
        header("Location: ../forms/managemedicines.php");
    }

    mysqli_close($conn);
}
