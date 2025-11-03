<?php
session_start();
include "../dbscripts/connection.php"; // Include your database connection

// Function to add items to the cart
if (isset($_POST['add_to_cart'])) {
    $cart_item = [
        'id' => $_POST['id'],
        'name' => $_POST['btname'],
        'price' => $_POST['price'],
        'quantity' => 1 // Default quantity is 1 for now
    ];

    // Check if the cart exists
    if (!isset($_SESSION['cart'])) {
        // If no cart session exists, create a new cart array with the first item
        $_SESSION['cart'] = [$cart_item];
    } else {
        // If cart session exists, check if the item is already in the cart
        $cart = $_SESSION['cart'];
        $item_exists = false;

        foreach ($cart as $index => $item) {
            if ($item['id'] == $cart_item['id']) {
                // If the item is already in the cart, increment its quantity
                $_SESSION['cart'][$index]['quantity'] += 1;
                $item_exists = true;
                break;
            }
        }

        // If item does not exist in the cart, add it as a new item
        if (!$item_exists) {
            $_SESSION['cart'][] = $cart_item;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lab Tests | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="../assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="../assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

    <!-- Custom CSS to make cards larger and more attractive -->
    <style>
        .test-card {
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .test-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .test-card .card-body {
            padding: 30px;
        }

        .test-card-title {
            font-size: 1.5rem;
            color: #333;
        }

        .test-card-text {
            font-size: 1rem;
            color: #555;
        }

        .add-to-cart-btn {
            background-color: #de1f26;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .add-to-cart-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .added-btn {
            background-color: #28a745 !important;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>

    <!-- ################# Test Details Start Here #######################--->
    <section class="container my-5">
        <div class="row">
            <?php
            $sql = "SELECT * FROM bloodtests"; // Fetch all test details from the tests table
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card test-card">
                            <div class="card-body">
                                <h5 class="card-title test-card-title"><?php echo $row['btname']; ?></h5>
                                <p class="card-text test-card-text"><strong>Pre-Information:</strong> <?php echo $row['preInfo']; ?></p>
                                <p class="card-text test-card-text"><strong>Delivery Time:</strong> <?php echo $row['deliverytime']; ?></p>
                                <p class="card-text test-card-text"><strong>Price:</strong> ₹<?php echo $row['price']; ?></p>
                                <!-- Add to Cart Form -->
                                <form method="POST" action="labtest.php" class="add-to-cart-form">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="btname" value="<?php echo $row['btname']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                    <button type="submit" name="add_to_cart" class="btn add-to-cart-btn" onclick="changeButtonText(this)">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='alert alert-warning'>No tests available</div>";
            }
            ?>
        </div>
    </section>

    <!--*************** About Us Starts Here ***************-->
    <?php include "about.php" ?>

    <!-- ################# Gallery Start Here #######################--->
    <?php include "gallary.php" ?>

    <!-- ################# Donation Process Start Here #######################--->
    <?php include "donationprocess.php" ?>

    <!-- *************** Footer Starts Here *************** -->
    <?php include "footer.php"; ?>

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/grid-gallery/js/grid-gallery.min.js"></script>
    <script src="../assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="../assets/js/script.js"></script>

    <script>
        // Function to change button text after adding to cart
        function changeButtonText(button) {
            button.innerHTML = "Added";
            button.classList.add("added-btn");
            button.disabled = true; // Disable the button after adding to cart
        }
    </script>
</body>

</html>