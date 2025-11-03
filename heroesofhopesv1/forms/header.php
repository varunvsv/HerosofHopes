<header class="continer-fluid ">
    <div class="header-top">
        <div class="container">
            <div class="row col-det">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="ulleft">
                        <li>
                            <i class="far fa-envelope"></i>
                            hoh@gmail.com
                            <span>|</span>
                        </li>
                        <li>
                            <i class="far fa-clock"></i>
                            Service Time : 6:00 AM to 9:00 PM
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="ulright">
                        <?php
                        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                            include "regloginbutton.php";
                        } else {
                            include "logoutbutton.php";
                        }
                        ?>



                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="menu-jk" class="header-bottom">
        <div class="container">
            <div class="row nav-row">
                <div class="col-md-3 logo">
                    <div style="display: flex; justify-content: center; align-items: center;  height: 100%;">
                        <img src="../assets/images/newlogo.png" alt="" style="height: 50px;width: 50px; margin:0px;">
                        <span style="color: #de1f26;">Heroes</span>
                        <span style="color: green;"> &nbsp;of</span>
                        <span class="title"> &nbsp;Hopes</span>
                    </div>
                    <!-- <img src="assets/images/logo.jpg" alt=""> -->
                </div>
                <div class="col-md-9 nav-col">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarNav"
                            aria-controls="navbarNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="labtest.php">Lab Tests</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#gallery">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#process">Process</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Donate Now</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>