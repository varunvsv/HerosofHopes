<?php
include "../dbscripts/connection.php";
include "../dbscripts/session_check.php";

if (isset($_SESSION['msg'])) {
    $error = $_SESSION['msg'];
    echo $error;
} else {
    $error = " ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>
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
                <h3>Add Medicine</h3>
            </div>
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="../dbscripts/insertmedicine.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <input type="text" id="mname" class="form-control text-center" placeholder="Medicine Name" name="mname" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <input type="text" id="brand_name" class="form-control text-center" placeholder="Brand Name" name="brand_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <textarea name="description" class="form-control" placeholder="Medicine Description" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <textarea name="side_effects" class="form-control" placeholder="Side Effects"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-center" placeholder="Dosage" name="dosage">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control text-center" placeholder="Price" name="price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control text-center" placeholder="Stock Quantity" name="stock" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label>Upload Image</label>
                                                    <input type="file" class="form-control" name="image" required>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-12 d-flex justify-content-center">
                                            <input type="submit" value="Add Medicine" class="btn btn-primary me-1 mb-1" />
                                        </div>
                                        <div class="row">
                                            <p><?php echo $error;
                                                $_SESSION['msg'] = "" ?></p>
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