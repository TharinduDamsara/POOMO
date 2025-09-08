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
    $current_page = 'blog';
    include "header.php";
    ?>
    <!-- NavBar -->

    <!-- Header -->
    <section class="page-header" id="blog-header">
        <h2>#TrendTalk</h2>
        <p>Our blog highlights everything about your favorite styles!</p>
    </section>
    <!-- Header -->

    <section class="blog">

        <div class="blog-box">
            <div class="blog-image">
                <img src="images/baner/b1 (1).jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>What's Hot This Season</h4>
                <p>Keeping up with fashion trends can be a game-changer for any fashion shop.
                    This season, bold prints, vibrant colors, and sustainable fabrics are all the rage.
                    Stock your shelves with statement pieces, like floral dresses, oversized blazers, and color-blocked sweaters.
                    Don’t forget the accessories—chunky jewelry and retro-inspired sunglasses are flying off shelves.
                    Stay ahead by following fashion influencers and trend reports to ensure your inventory stays relevant...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>02/01</h1>
        </div>

        <div class="blog-box">
            <div class="blog-image">
                <img src="images/baner/blog 2.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>5 Tips for Creating a Memorable Shopping Experience</h4>
                <p>Your shop’s ambiance plays a huge role in customer satisfaction.
                    Start by designing an inviting storefront that reflects your brand’s personality.
                    Organize your shop layout for easy navigation and make sure your dressing rooms are clean and comfortable.
                    Offering personalized services, like styling advice or loyalty programs, can also create a lasting impression.
                    Most importantly, train your staff to provide friendly and attentive service that makes customers feel valued...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>02/05</h1>
        </div>

        <div class="blog-box">
            <div class="blog-image">
                <img src="images/baner/b2 (1).jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>How to Choose the Perfect Clothing for Your Target Audience</h4>
                <p>Understanding your target audience is key to curating the right inventory.
                    Start by researching their age, style preferences, and spending habits.
                    Use this information to stock pieces that resonate with their lifestyle—whether that’s trendy streetwear for teens or classic workwear for professionals.
                    Keep track of your best-sellers and gather feedback from your customers to continually refine your selection...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>05/02</h1>
        </div>

        <div class="blog-box">
            <div class="blog-image">
                <img src="images/baner/b3.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Seasonal Sales Strategies to Boost Your Revenue</h4>
                <p>Seasonal sales are an excellent way to draw in customers and clear out old inventory.
                    Plan promotions around holidays, like Christmas or Black Friday, and offer exclusive discounts or bundles.
                    Create eye-catching window displays that highlight sale items and use social media to spread the word.
                    Limited-time offers can create urgency and drive more foot traffic to your store...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>10/15</h1>
        </div>

        <div class="blog-box">
            <div class="blog-image">
                <img src="images/baner/blog 4.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Tips to Stay Competitive</h4>
                <p>With online shopping on the rise, having an e-commerce presence is crucial.
                    Build a user-friendly website with high-quality images and detailed product descriptions.
                    Leverage social media to engage with your audience and promote your shop.
                    Consider offering perks like free shipping or in-store pickup options.
                    To stand out, focus on exceptional customer service and ensure your online and offline experiences are seamless...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>10/28</h1>
        </div>

        <div class="blog-box">
            <div class="blog-image">
                <img src="images/baner/b6.jpg" alt="">
            </div>
            <div class="blog-details">
                <h4>Accessories That Complete the Look</h4>
                <p>Accessories can make or break an outfit, and they’re also a great way to increase your shop’s revenue.
                    Stock a variety of accessories, like statement earrings, belts, and handbags, that complement your clothing line.
                    Display them near the checkout area for impulse buys, and create coordinated looks with mannequins to inspire your customers.
                    Remember, the right accessory can transform an outfit into a fashion statement...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>11/22</h1>
        </div>

    </section>

    <!-- pagination -->
    <section>
        <nav aria-label="...">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </section>
    <!-- pagination -->

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