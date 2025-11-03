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
    <title>Add Donor</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

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
                <h3>Add Test</h3>
            </div>

            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="../dbscripts/inserttest.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <input type="text" id="first-name-column" class="form-control text-center" placeholder="Test Name" name="tname" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <input type="text" id="last-name-column" class="form-control text-center" placeholder="Pre Test Info. ex : Fasting, No - Fasting" name="ptdesc" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <input type="text" id="city-column" class="form-control text-center" placeholder="Enter Hours / Days" name="dtime" required>

                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <select name="dpost" id="" class="form-control">
                                                        <option>Select Hours / Days</option>

                                                        <option value="Hours">Hours</option>
                                                        <option value="Days">Days</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <input type="number" id="city-column" class="form-control text-center" placeholder="Enter Price" name="price" required>

                                                </div>
                                            </div>



                                            <hr>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="">Enter Description</label>
                                                    <textarea name="content" class="form-control" required></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="col-12 d-flex justify-content-center">
                                            <input type="submit" value="Add Test" class="btn btn-primary me-1 mb-1" />
                                        </div>
                                        <div class="row">
                                            <p><?php echo $error;
                                                $_SESSION['msg'] = ""   ?></p>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="text-center">
                    <p>2024 &copy; HoH Team</p>
                </div>

            </div>
        </footer>
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