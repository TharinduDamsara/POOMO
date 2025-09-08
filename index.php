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
    $current_page = 'home';
    include "header.php";
    ?>
    <!-- NavBar -->

    <!-- Slider -->
    <video autoplay loop muted plays-inline class="back-video">
        <source src="slider/slider.mp4" type="video/mp4">
    </video>

    <section class="hero">
        <h4>Trade-In-Offer</h4>
        <h2>Super Value Deals</h2>
        <h1>On All Products</h1>
        <p>Save more with coupons & up to 75% off!</p>
        <a href="shop.php"><button id="button" type="button" class="btn btn-warning btn-lg mt-3">Shop Now</button></a>
    </section>
    <!-- Slider -->

    <!-- Category -->
    <section class="feature">

        <?php

        $category_rs = Database::search("SELECT * FROM `category`");
        $category_num = $category_rs->num_rows;

        for ($x = 0; $x < $category_num; $x++) {
            $category_data = $category_rs->fetch_assoc();
        ?>
            <a href="shop.php">
                <div class="fe-box">
                    <img src="<?php echo $category_data["cat_img_path"]; ?>" alt="">
                    <h6><?php echo $category_data["cat_name"]; ?></h6>
                </div>
            </a>
        <?php
        }

        ?>

    </section>
    <!-- Category -->

    <!-- Featured Products -->
    <?php

    $product_rs = Database::search("SELECT * FROM `product` WHERE `status_status_id`='1' ORDER BY `datetime_added` DESC LIMIT 8 OFFSET 0 ");
    $product_num = $product_rs->num_rows;

    ?>

    <section class="product1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">

            <?php

            if ($product_num > 0) {
                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc();

                    $category_rs2 = Database::search("SELECT * FROM `category` where `cat_id` = '" . $product_data["category_cat_id"] . "' ");
                    $category_data2 = $category_rs2->fetch_assoc();

            ?>
                    <!-- Product card -->
                    <div class="pro" data-category="<?php echo $category_data2["cat_name"]; ?>" onclick="window.location.href='singleProduct.php?id=<?php echo $product_data['id']; ?>'; ">

                        <?php

                        $brand_rs = Database::search("SELECT * FROM `brand` where `brand_id` = '" . $product_data["brand_brand_id"] . "' ");
                        // $brand_num = $brand_rs->num_rows;
                        $brand_data = $brand_rs->fetch_assoc();

                        $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $product_data["id"] . "' ");
                        $img_num = $img_rs->num_rows;
                        $img_data = $img_rs->fetch_assoc();

                        if ($img_num > 0) {
                        ?>
                            <img src="<?php echo $img_data["img_path"]; ?>" alt="">
                        <?php
                        } else {
                        ?>
                            <img src="images/logo/logo1.png" alt="">
                        <?php
                        }

                        ?>

                        <div class="des">
                            <span><?php echo $brand_data["brand_name"]; ?></span>
                            <h5><?php echo $product_data["name"]; ?></h5>
                            <div class="star">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h4>Rs.<?php echo $product_data["price"]; ?>.00</h4>
                        </div>
                        <a href="#"><i class="bi bi-cart-plus cart"></i></a>
                    </div>

                <?php

                }
            } else {

                ?>

                <div class="pro">
                    <img src="images\products\f3.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h4>Rs.1,500.00</h4>
                    </div>
                    <a href="#"><i class="bi bi-cart-plus cart"></i></a>
                </div>

            <?php

            }
            ?>

        </div>
    </section>
    <!-- Featured Products -->

    <!-- Banner -->
    <section class="banner">
        <h4>Exclusive Savings Alert</h4>
        <h2>Up To <span>70% Off</span> - All T-Shirts & Accessories</h2>
        <a href="shop.php" type="button" class="btn btn-outline-light">Shop Now</a>
    </section>
    <!-- Banner -->

    <!-- New Arrivals Product -->
    <?php

    $product_rs = Database::search("SELECT * FROM `product` WHERE `status_status_id`='1' ORDER BY `datetime_added` DESC LIMIT 8 OFFSET 0 ");
    $product_num = $product_rs->num_rows;

    ?>

    <section class="product1">
        <h2>New Arrivals</h2>
        <p>Refresh Your Style with 2025 Fashion</p>
        <div class="pro-container">

            <?php

            if ($product_num > 0) {
                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc();

                    $category_rs2 = Database::search("SELECT * FROM `category` where `cat_id` = '" . $product_data["category_cat_id"] . "' ");
                    $category_data2 = $category_rs2->fetch_assoc();

            ?>
                    <!-- Product -->
                    <div class="pro" data-category="<?php echo $category_data2["cat_name"]; ?>" onclick="window.location.href='singleProduct.php?id=<?php echo $product_data['id']; ?>'; ">

                        <?php

                        $brand_rs = Database::search("SELECT * FROM `brand` where `brand_id` = '" . $product_data["brand_brand_id"] . "' ");
                        // $brand_num = $brand_rs->num_rows;
                        $brand_data = $brand_rs->fetch_assoc();

                        $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $product_data["id"] . "' ");
                        $img_num = $img_rs->num_rows;
                        $img_data = $img_rs->fetch_assoc();

                        if ($img_num > 0) {
                        ?>
                            <img src="<?php echo $img_data["img_path"]; ?>" alt="">
                        <?php
                        } else {
                        ?>
                            <img src="images/logo/logo2.png" alt="">
                        <?php
                        }

                        ?>

                        <div class="des">
                            <span><?php echo $brand_data["brand_name"]; ?></span>
                            <h5><?php echo $product_data["name"]; ?></h5>
                            <div class="star">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h4>Rs.<?php echo $product_data["price"]; ?>.00</h4>
                        </div>
                        <a href="#"><i class="bi bi-cart-plus cart"></i></a>
                    </div>

                <?php

                }
            } else {

                ?>

                <div class="pro">
                    <img src="images/logo/logo2.png" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h4>Rs.1,500.00</h4>
                    </div>
                    <a href="#"><i class="bi bi-cart-plus cart"></i></a>
                </div>

            <?php

            }
            ?>

        </div>
    </section>
    <!-- New Arrivals Product -->

    <!-- SM-Banner 1 -->
    <section class="sm-banner">
        <div class="banner-box">
            <h4>Crazy Deals</h4>
            <h2>Buy 1 Get 1 Free</h2>
            <span>The best classic dress is on sale at poomo</span>
        </div>
        <div class="banner-box banner-box2">
            <h4>Spring | Summer</h4>
            <h2>Upcoming Season</h2>
            <span>The best classic dress is on sale at poomo</span>
            <a href="shop.php" type="button" class="btn btn-outline-light mt-3">Collection</a>
        </div>
    </section>
    <!-- SM-Banner 1 -->

    <!-- SM-Banner 2 -->
    <section class="sm-banner2">
        <div class="banner-box banner-box">
            <h2></h2>
            <h3></h3>
        </div>
        <div class="banner-box banner-box2">
            <h2></h2>
            <h3></h3>
        </div>
        <div class="banner-box banner-box3">
            <h2></h2>
            <h3></h3>
        </div>
    </section>
    <!-- SM-Banner 2 -->

    <!-- modal -->
    <div class="modal" tabindex="-1" id="fpmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12 col-lg-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="np" />
                                <button class="btn btn-outline-danger" type="button" id="npb" onclick="showPassword1();">Show</button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rp" />
                                <button class="btn btn-outline-danger" type="button" id="rpb" onclick="showPassword2();">Show</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="vcode" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset Password</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

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