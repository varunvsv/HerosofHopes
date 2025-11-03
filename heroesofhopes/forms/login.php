<?php
include "../dbscripts/connection.php";
// include "../dbscripts/session_check.php";
session_start();

if (isset($_SESSION['msg'])) {
    $error = $_SESSION['msg'];
    // echo $error;
} else {
    $error = " ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('../assets/images/loginback.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            font-family: 'Roboto', sans-serif;
        }

        .form-2-wrapper {
            background: brown;
            opacity: 0.8;
            padding: 50px;
            border-radius: 8px;
            color: white;
        }

        input.form-control {
            padding: 11px;
            border: none;
            border: 2px solid #ffffff;
            border-radius: 30px;
            background-color: white;
            font-family: Arial, Helvetica, sans-serif;


        }

        input.form-control:focus {
            box-shadow: none !important;
            outline: 0px !important;
            background-color: white;
        }

        input.login-btn {
            background: #ffffff;
            color: brown;
            font-weight: 800;
            border: none;
            padding: 10px;
            border-radius: 30px;
        }

        .register-test a {
            color: #000;
        }

        .social-login button {
            border-radius: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Left Blank Side -->
            <div class="col-lg-6"></div>

            <!-- Right Side Form -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center right-side">
                <div class="form-2-wrapper">
                    <div class="logo text-center">
                        <div style="display: flex; justify-content: center; align-items: center;  height: 100%;">
                            <img src="../assets/images/newlogo.png" alt="" style="height: 50px;width: 50px; margin:10px;">
                            <span class="title"> &nbsp;Heroes of Hopes</span>
                        </div>
                    </div>
                    <h2 class="text-center mb-4">Sign Into Your Account</h2>
                    <form action="../dbscripts/login.php" method="POST">
                        <div class="mb-3 form-box">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
                        </div>

                        <input type="submit" class="btn btn-outline-secondary login-btn w-100 mb-3" value="Login" />
                        <div class="text-center">
                            <p><?php echo $error;
                                $_SESSION['msg'] = ""   ?></p>

                        </div>
                    </form>

                    <!-- Register Link -->
                    <p class="text-center register-test mt-3">Don't have an account? <a href="register.php" class="text-decoration-none">Register here</a></p>

                </div>
            </div>
        </div>
    </div>

</body>

</html>