<?php
include "../dbscripts/connection.php";
// include "../dbscripts/session_check.php";
session_start();

if (isset($_SESSION['msg'])) {
    $error = $_SESSION['msg'];
    echo $error;
} else {
    $error = " ";
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="shortcut icon" href="../assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/fav.jpg">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="../assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
</head>

<body>
    <?php include "header.php" ?>

    <!-- ################# Slider Starts Here#######################--->
    <section>
        <div class="form-card">
            <div style="background-color: white; text-align: center; margin-top: 10px;color:brown;font-weight: 600;">
                <h2>Registration</h2>
            </div>
            <div class="card-content" style="text-align:center;">
                <div class="card-body" style="width: 800px; margin:0 auto">
                    <form class="form" action="../dbscripts/registeruser.php" method="post">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <input type="text" id="first-name-column" class="form-control" placeholder="Full Name" name="fname" required="">
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <input type="email" id="city-column" class="form-control" placeholder="Email" name="email" required="">
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <input type="number" id="country-floating" class="form-control" name="mno" placeholder="Mobile Number" required="">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <input type="password" id="city-column" class="form-control" placeholder="Password" name="password" required="">
                                </div>
                            </div>

                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <input type="submit" value="Register" class="btn btn-primary me-1 mb-1 px-5">
                        </div>
                        <div class="row text-center">
                            <p><?php echo $error;
                                $_SESSION['msg'] = ""   ?></p>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!--*************** About Us Starts Here ***************-->

    <!-- ################# Donation Process Start Here #######################--->

    <?php include "donationprocess.php" ?>


    <!--*************** Footer  Starts Here *************** -->
    <?php include "footer.php" ?>


</body>

<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/plugins/grid-gallery/js/grid-gallery.min.js"></script>
<script src="../assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="../assets/js/script.js"></script>

</html>