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
    <?php

    $did = $_GET['edit'];
    $result = $conn->query("SELECT * FROM donors WHERE id=$did");
    $row = $result->fetch_assoc();

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
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
                <h3>Edit Donor</h3>
            </div>

            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="../dbscripts/editdonor.php" method="post">
                                        <input type="hidden" name="did" value="<?php echo  $did; ?>">

                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $row['fname']; ?>" id="first-name-column" class="form-control" placeholder="First Name" name="fname" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $row['lname']; ?>" id="last-name-column" class="form-control" placeholder="Last Name" name="lname" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="email" value="<?php echo $row['email']; ?>" id="city-column" class="form-control" placeholder="Email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="number" value="<?php echo $row['age']; ?>" id="country-floating" class="form-control" name="age" placeholder="Age" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="number" value="<?php echo $row['mno']; ?>" id="country-floating" class="form-control" name="mno" placeholder="Mobile Number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">

                                                    <select name="gender" id="" class="form-control" required>
                                                        <option value="#">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">

                                                    <select name="bgroup" id="" class="form-control" required>
                                                        <option value="#" hidden>Select Blood Group</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Enter Message</label>
                                                    <textarea name="message" id="" rows="5" cols="50" class="form-control" required> <?php echo $row['msg']; ?></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="col-12 d-flex justify-content-center">
                                            <input type="submit" value="Edit Donor" class="btn btn-primary me-1 mb-1" />
                                        </div>
                                        <div class="row">
                                            <p><?php echo $error;
                                                $_SESSION['msg'] = ""   ?></p>

                                        </div>
                                </div>
                                </form>
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
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>