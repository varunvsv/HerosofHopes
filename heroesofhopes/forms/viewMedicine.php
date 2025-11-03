<?php
session_start();
include "../dbscripts/connection.php"; // Include your database connection

// Check if the medicine ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the details of the selected medicine
    $sql = "SELECT * FROM medicines WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $medicine = $result->fetch_assoc();
    } else {
        $_SESSION['msg'] = "Medicine not found!";
        header('Location: medicines.php');
        exit();
    }
} else {
    // Redirect to the medicines page if no ID is provided
    header('Location: medicines.php');
    exit();
}

// Handle "Add to Cart" action
if (isset($_POST['add_to_cart'])) {
    $cart_item = [
        'id' => $medicine['id'],
        'name' => $medicine['mname'],
        'price' => $medicine['price'],
        'quantity' => 1 // Default quantity is 1
    ];

    // If cart session exists, add the new item
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $cart[] = $cart_item;
        $_SESSION['cart'] = $cart;
    } else {
        // If cart doesn't exist, create a new cart session
        $_SESSION['cart'] = [$cart_item];
    }

    $_SESSION['msg'] = $medicine['mname'] . " has been added to your cart!";
    header('Location: cart.php'); // Redirect to the cart page
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $medicine['mname']; ?> | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="../assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="../assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

    <!-- Custom CSS for styling -->
    <style>
        .medicine-details {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .medicine-image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .medicine-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }

        .medicine-info {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .medicine-info strong {
            color: #555;
        }

        .cart-btn {
            background-color: #de1f26;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1rem;
        }

        .cart-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>

    <!-- ################# Medicine Details Start Here #######################--->
    <section class="container medicine-details">
        <div class="row">
            <div class="col-md-6">
                <div class="medicine-image-container">
                    <img src="../admin/uploads/medicines/<?php echo $medicine['image']; ?>" alt="<?php echo $medicine['mname']; ?>" class="medicine-image">
                </div>
            </div>
            <div class="col-md-6">
                <h3><?php echo $medicine['mname']; ?></h3>
                <p class="medicine-info"><strong>Brand:</strong> <?php echo $medicine['brand_name']; ?></p>
                <p class="medicine-info"><strong>Price:</strong> ₹<?php echo $medicine['price']; ?></p>
                <p class="medicine-info"><strong>Dosage:</strong> <?php echo $medicine['dosage']; ?></p>
                <p class="medicine-info"><strong>Description:</strong> <?php echo $medicine['description']; ?></p>
                <p class="medicine-info"><strong>Side Effects:</strong> <?php echo $medicine['side_effects']; ?></p>

                <form method="POST" action="viewMedicine.php?id=<?php echo $medicine['id']; ?>">
                    <input type="hidden" name="medicine_id" value="<?php echo $medicine['id']; ?>">
                    <button type="submit" name="add_to_cart" class="btn cart-btn">Add to Cart</button>
                </form>
            </div>
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