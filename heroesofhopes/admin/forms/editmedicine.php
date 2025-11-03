<?php
include "../dbscripts/connection.php";
include "../dbscripts/session_check.php";

// Get the medicine ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current details of the medicine from the database
    $sql = "SELECT * FROM medicines WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $medicine = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['msg'] = "Medicine not found!";
        header('Location: managemedicines.php');
        exit;
    }
} else {
    header('Location: managemedicines.php');
    exit;
}

// Handle form submission for updating the medicine
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mname = $_POST['mname'];
    $brand_name = $_POST['brand_name'];
    $description = $_POST['description'];
    $side_effects = $_POST['side_effects'];
    $dosage = $_POST['dosage'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Check if a new image was uploaded
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        $target_dir = "../uploads/medicines/";
        $target_file = $target_dir . basename($image);

        // Move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Delete the old image
            $old_image = "../uploads/medicines/" . $medicine['image'];
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        } else {
            $_SESSION['msg'] = "Failed to upload the new image!";
            header('Location: editmedicine.php?id=' . $id);
            exit;
        }
    } else {
        $image = $medicine['image']; // Keep the old image if no new image is uploaded
    }

    // Update the medicine in the database
    $sql = "UPDATE medicines SET 
            mname='$mname', 
            brand_name='$brand_name', 
            description='$description', 
            side_effects='$side_effects', 
            dosage='$dosage', 
            price='$price', 
            stock='$stock', 
            image='$image' 
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "Medicine updated successfully!";
        header('Location: managemedicines.php');
    } else {
        $_SESSION['msg'] = "Error updating medicine: " . mysqli_error($conn);
        header('Location: editmedicine.php?id=' . $id);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Medicine</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include "sidebar.php"; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Edit Medicine</h3>
            </div>

            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Medicine Information</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="editmedicine.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <input type="text" id="mname" class="form-control text-center" value="<?php echo $medicine['mname']; ?>" placeholder="Medicine Name" name="mname" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <input type="text" id="brand_name" class="form-control text-center" value="<?php echo $medicine['brand_name']; ?>" placeholder="Brand Name" name="brand_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <textarea name="description" class="form-control" placeholder="Medicine Description" required><?php echo $medicine['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <textarea name="side_effects" class="form-control" placeholder="Side Effects"><?php echo $medicine['side_effects']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" value="<?php echo $medicine['dosage']; ?>" placeholder="Dosage" name="dosage">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control text-center" value="<?php echo $medicine['price']; ?>" placeholder="Price" name="price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control text-center" value="<?php echo $medicine['stock']; ?>" placeholder="Stock Quantity" name="stock" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label>Upload New Image (Optional)</label>
                                                    <input type="file" class="form-control" name="image">
                                                    <small>Current Image: <img src="../uploads/medicines/<?php echo $medicine['image']; ?>" alt="<?php echo $medicine['mname']; ?>" width="50"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-12 d-flex justify-content-center">
                                            <input type="submit" value="Update Medicine" class="btn btn-primary me-1 mb-1" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>