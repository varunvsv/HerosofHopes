<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mname = $_POST['mname'];
    $brand_name = $_POST['brand_name'];
    $description = $_POST['description'];
    $side_effects = $_POST['side_effects'];
    $dosage = $_POST['dosage'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Image upload
    $image = $_FILES['image']['name'];
    $target_dir = "../uploads/medicines/";
    $target_file = $target_dir . basename($image);

    // Move uploaded file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO medicines (mname, brand_name, description, side_effects, dosage, price, stock, image) 
                VALUES ('$mname', '$brand_name', '$description', '$side_effects', '$dosage', '$price', '$stock', '$image')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['msg'] = "Medicine added successfully!";
            header('Location: ../forms/addmedicine.php');
        } else {
            $_SESSION['msg'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
            header('Location: ../forms/addmedicine.php');
        }
    } else {
        $_SESSION['msg'] = "Image upload failed!";
        header('Location: ../forms/addmedicine.php');
    }

    mysqli_close($conn);
}
