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
    $current_page = 'about';
    include "header.php";
    ?>
    <!-- NavBar -->

    <!-- Header -->
    <section class="page-header" id="about-header">
        <h2>#AboutUs</h2>
        <p>Why We Do What We Do?</p>
    </section>
    <!-- Header -->

    <section id="about-head" class="section-p1">
        <img src="images\feature\Featured.webp" alt="">
        <div>
            <h2>Who Are We?</h2>
            <p>We are a modern clothing shop dedicated to helping you express your unique style.
                Our passion lies in curating a blend of timeless classics and the latest trends,
                ensuring there’s something for everyone. At the heart of our shop is a commitment to quality,
                affordability, and sustainability, as we believe fashion should be both accessible and responsible.
                Whether you’re dressing for a special occasion or elevating your everyday look,
                we’re here to inspire confidence and celebrate individuality with every piece we offer.</p>
        </div>
    </section>

    <section id="about-add" class="section-p1">
        <h1><span>New </span>Collection</h1>
        <div class="video">
            <video autoplay muted loop src="images\products\AD.mp4"></video>
        </div>
    </section>

    <section class="feature section-p1">

        <div class="fe-box">
            <img src="images/feature/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="images/feature/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="images/feature/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="images/feature/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="images/feature/f5.png" alt="">
            <h6>Happy Sale</h6>
        </div>
        <div class="fe-box">
            <img src="images/feature/f6.png" alt="">
            <h6>Support</h6>
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