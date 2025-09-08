<?php

include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POOMO</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
    <link class="icon" rel="icon" href="images/logo/logo5.png" />
</head>

<body>

    <!-- NavBar -->
    <?php
    $current_page = 'cart';
    include "header.php";
    ?>
    <!-- NavBar -->

    <!-- Header -->
    <section class="page-header" id="cart-header">
        <h2>Your Picks</h2>
        <p>Ready to make it yours?</p>
    </section>
    <!-- Header -->

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            <tbody>
                <tr>
                    <td><a href="#"><i class="bi bi-x-circle"></i></a></td>
                    <td><img src="images/products/f1.jpg" alt=""></td>
                    <td>Cartoon Astronaut T-Shirts</td>
                    <td>Rs.1,500.00</td>
                    <td><input type="number" value="1"></td>
                    <td>Rs.1,500.00</td>
                </tr>
                <tr>
                    <td><a href="#"><i class="bi bi-x-circle"></i></a></td>
                    <td><img src="images/products/f1.jpg" alt=""></td>
                    <td>Cartoon Astronaut T-Shirts</td>
                    <td>Rs.1,500.00</td>
                    <td><input type="number" value="1"></td>
                    <td>Rs.1,500.00</td>
                </tr>
                <tr>
                    <td><a href="#"><i class="bi bi-x-circle"></i></a></td>
                    <td><img src="images/products/f1.jpg" alt=""></td>
                    <td>Cartoon Astronaut T-Shirts</td>
                    <td>Rs.1,500.00</td>
                    <td><input type="number" value="1"></td>
                    <td>Rs.1,500.00</td>
                </tr>
                <tr>
                    <td><a href="#"><i class="bi bi-x-circle"></i></a></td>
                    <td><img src="images/products/f1.jpg" alt=""></td>
                    <td>Cartoon Astronaut T-Shirts</td>
                    <td>Rs.1,500.00</td>
                    <td><input type="number" value="1"></td>
                    <td>Rs.1,500.00</td>
                </tr>
            </tbody>
            </thead>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon">
                <button type="button" class="btn btn-warning">Apply</button>
            </div>
        </div>
        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>Rs.1,500.00</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>Rs.1,500.00</strong></td>
                </tr>
            </table>
            <button type="button" class="btn btn-danger">Proceed to checkout</button>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include "footer.php";
    ?>
    <!-- Footer -->




    <!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>