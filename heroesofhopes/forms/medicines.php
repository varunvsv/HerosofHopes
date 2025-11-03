<?php
session_start();
include "../dbscripts/connection.php"; // Include your database connection

// Handle search functionality
$searchQuery = "";
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $sql = "SELECT * FROM medicines WHERE mname LIKE '%$searchQuery%' OR brand_name LIKE '%$searchQuery%' LIMIT 20";
} else {
    // Fetch 20 random medicines if no search query is provided
    $sql = "SELECT * FROM medicines ORDER BY RAND() LIMIT 20";
}

$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Medicines | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="../assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="../assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

    <!-- Custom CSS to make cards larger and more attractive -->
    <style>
        .medicine-card {
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .medicine-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .medicine-card .card-body {
            padding: 30px;
        }

        .medicine-card-title {
            font-size: 1.5rem;
            color: #333;
        }

        .medicine-card-text {
            font-size: 1rem;
            color: #555;
        }

        .medicine-image {
            width: 100%;
            height: 200px;
            padding: 10px;
        }

        .view-more-btn {
            background-color: #de1f26;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1rem;
        }

        .view-more-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .search-bar {
            margin-bottom: 30px;
        }

        .search-bar input {
            border-radius: 20px;
            padding: 10px 20px;
            width: 100%;
            max-width: 400px;
            margin-right: 10px;
        }

        .search-bar button {
            border-radius: 20px;
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>

    <!-- ################# Search Bar and Medicine Details Start Here #######################--->
    <section class="container my-5">
        <div class="row">
            <div class="col-12 search-bar text-center">
                <form method="GET" action="medicines.php">
                    <input type="text" name="search" placeholder="Search for medicines or brands..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card medicine-card">
                            <img src="../admin/uploads/medicines/<?php echo $row['image']; ?>" alt="<?php echo $row['mname']; ?>" class="medicine-image">
                            <div class="card-body">
                                <h5 class="card-title medicine-card-title"><?php echo $row['mname']; ?></h5>
                                <p class="card-text medicine-card-text"><strong>Brand:</strong> <?php echo $row['brand_name']; ?></p>
                                <p class="card-text medicine-card-text"><strong>Price:</strong> ₹<?php echo $row['price']; ?></p>
                                <br>
                                <a href="viewMedicine.php?id=<?php echo $row['id']; ?>" class="btn view-more-btn">View More</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='alert alert-warning'>No medicines found</div>";
            }
            ?>
        </div>
    </section>

    <!--*************** About Us Starts Here ***************-->
    <?php include "about.php"; ?>

    <!-- ################# Gallery Start Here #######################--->
    <?php include "gallary.php"; ?>

    <!-- ################# Donation Process Start Here #######################--->
    <?php include "donationprocess.php"; ?>

    <!-- *************** Footer Starts Here *************** -->
    <?php include "footer.php"; ?>

</body>

<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/plugins/grid-gallery/js/grid-gallery.min.js"></script>
<script src="../assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="../assets/js/script.js"></script>

</html>