<?php
session_start();
include "../dbscripts/connection.php"; // Include your database connection

// Initialize total price
$total_price = 0;

// Check if the cart is empty
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    $_SESSION['msg'] = "Your cart is empty!";
}

if (isset($_POST['remove_item'])) {
    $id = $_POST['id'];

    // Remove the item from the cart
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array
            $_SESSION['msg'] = "Item removed from cart!";
            break;
        }
    }

    header('Location: cart.php');
    exit();
}

// Calculate total price and handle the case if there are items in the cart
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping Cart | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="../assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="../assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

    <!-- Custom CSS for styling -->
    <style>
        .cart-details {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .cart-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
        }

        .cart-summary {
            font-size: 1.2rem;
            color: #333;
            margin-top: 20px;
        }

        .cart-summary strong {
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

        .cart-empty {
            text-align: center;
            padding: 40px;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>

    <!-- ################# Cart Details Start Here #######################--->
    <section class="container cart-details">
        <div class="row">
            <div class="col-12">
                <h3>Your Cart</h3>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo "<div class='alert alert-info'>" . $_SESSION['msg'] . "</div>";
                    unset($_SESSION['msg']);
                }

                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                ?>
                    <table class="cart-table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION['cart'] as $item) {
                                $item_total = $item['price'] * $item['quantity'];
                                echo "
                                <tr>
                                    <td>{$item['name']}</td>
                                    <td>₹{$item['price']}</td>
                                    <td>{$item['quantity']}</td>
                                    <td>₹$item_total</td>
                                    <td>
                                        <form method='POST' action='cart.php'>
                                            <input type='hidden' name='id' value='{$item['id']}'>
                                            <button type='submit' name='remove_item' class='btn btn-danger btn-sm'>Remove</button>
                                        </form>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="cart-summary">
                        <p><strong>Total Price:</strong> ₹<?php echo $total_price; ?></p>
                        <a href="checkout.php" class="btn cart-btn">Proceed to Checkout</a>
                    </div>
                <?php
                } else {
                    echo "<div class='cart-empty'><h5>Your cart is empty!</h5></div>";
                }
                ?>
            </div>
        </div>
    </section>

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