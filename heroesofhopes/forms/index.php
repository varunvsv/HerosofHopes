<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web App Landing Page Website Tempalte | Smarteyeapps.com</title>
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
    <?php include "slider.php" ?>


    <!--*************** About Us Starts Here ***************-->
    <?php include "about.php" ?>


    <!-- ################# Gallery Start Here #######################--->
    <?php include "gallary.php" ?>




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