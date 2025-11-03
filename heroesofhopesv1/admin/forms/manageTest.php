<?php
include "../dbscripts/connection.php";
include "../dbscripts/session_check.php";

if (isset($_SESSION['msg'])) {
    $error = $_SESSION['msg'];
    echo $error;
} else {
    $error = " ";
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM bloodtests WHERE id=$id");
    header('Location: manageTest.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Test</title>

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
                <h3>Test Details</h3>
            </div>
            <section class="section">
                <div class="row" id="table-striped-dark">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content">

                                <!-- table strip dark -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-dark mb-0">
                                        <thead>
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Pre-Req</th>
                                                <th>Delivery Time</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $sql = "SELECT * FROM bloodtests";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                    <td>" . $row["btname"] . "</td>
                                    <td>" . $row["preInfo"] . "</td>
                                    <td>" . $row["deliverytime"] . "</td>
                                    <td style='width:30%'>" . $row["description"] . "</td>
                                    <td>₹ " . $row["price"] . "</td>
                                    <td><a href='editTest.php?edit=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='manageTest.php?delete=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>
                                  </tr>";
                                                }
                                                echo "</tbody></table>";
                                            } else {
                                                echo "<div class='alert alert-warning'>No Tests found</div>";
                                            }

                                            $conn->close();
                                            ?>

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