<?php

include "connection.php";

if (isset($_GET["id"])) {
    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `category` ON
    product.category_cat_id = category.cat_id INNER JOIN `brand` ON product.brand_brand_id = brand.brand_id
    INNER JOIN `admin` ON product.admin_email = admin.email WHERE `id` = '" . $pid . "' ");

    if ($product_rs->num_rows == 1) {
        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $product_data["name"]; ?> | POOMO</title>
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="style.css" />
            <link class="icon" rel="icon" href="images/logo/logo5.png" />
        </head>

        <body>

            <!-- NavBar -->
            <?php
            $current_page = 'shop';
            include "header.php";
            ?>
            <!-- NavBar -->

            <section class="pro_details">
                <div class="single-pro-img">

                    <?php

                    $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $pid . "' ");
                    $img_num = $img_rs->num_rows;
                    $img = array();

                    if ($img_num != 0) {
                        for ($x = 0; $x < $img_num; $x++) {
                            $img_data = $img_rs->fetch_assoc();
                            $img[$x] = $img_data["img_path"];
                        }

                    ?>

                        <img src="<?php echo $img[0]; ?>" width="100%" id="mainImg" alt="">
                        <div class="small-image">
                            <?php for ($x = 0; $x < $img_num; $x++) {
                            ?>
                                <div class="small-img-col">
                                    <img src="<?php echo $img[$x]; ?>" width="100%" class="sm-img" alt="" <?php echo $x + 1; ?>>
                                </div>
                            <?php

                            }
                            ?>

                        </div>

                    <?php

                    } else {
                    ?>

                        <img src="images/logo/logo1.png" width="100%" id="mainImg" alt="">
                        <div class="small-image">
                            <div class="small-img-col">
                                <img src="images/logo/logo1.png" width="100%" class="sm-img" alt="">
                            </div>
                            <div class="small-img-col">
                                <img src="images/logo/logo1.png" width="100%" class="sm-img" alt="">
                            </div>
                            <div class="small-img-col">
                                <img src="images/logo/logo1.png" width="100%" class="sm-img" alt="">
                            </div>
                            <div class="small-img-col">
                                <img src="images/logo/logo1.png" width="100%" class="sm-img" alt="">
                            </div>
                        </div>

                    <?php
                    }

                    ?>


                </div>
                <div class="single-pro-details">
                    <h6><?php echo $product_data["brand_name"]; ?></h6>
                    <h4><?php echo $product_data["cat_name"]; ?> | <?php echo $product_data["name"]; ?></h4>
                    <h2>Rs.<?php echo $product_data["price"]; ?>.00</h2>
                    <select>
                        <option>Select Size</option>
                        <option>XL</option>
                        <option>XXL</option>
                    </select>
                    <p style="font-size: small;">Hurry! Only <?php echo $product_data["qty"]; ?> Left in Stock | <i class="bi bi-truck"></i> Free Shipping</p>
                    <input type="number" onkeyup="checkQty(<?php echo $product_data['qty']; ?>);" min="1" value="1" id="qty_input">
                    <button type="button" class="btn btn-warning">Add To Cart</button>
                    <button type="button" class="btn btn-success">Buy Now</button>
                    <h4>Product Details</h4>
                    <p>
                        <?php echo $product_data["description"]; ?>
                    </p>
                </div>
            </section>

            <!-- Product -->
            <section class="product1">
                <h2>Similar Styles</h2>
                <p>Find Your Style Match</p>
                <div class="pro-container">

                    <?php

                    $related_rs = Database::search("SELECT * FROM `product` WHERE 
                    `category_cat_id` = '" . $product_data["category_cat_id"] . "' LIMIT 8 ");

                    for ($x = 0; $x < $related_rs->num_rows; $x++) {
                        $related_data = $related_rs->fetch_assoc();
                    ?>
                        <div class="pro" onclick="window.location.href='singleProduct.php?id=<?php echo $related_data['id']; ?>'; ">
                            <?php

                            $productImg_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $related_data["id"] . "' ");
                            $productImg_data = $productImg_rs->fetch_assoc();

                            $brand_rs = Database::search("SELECT * FROM `brand` where `brand_id` = '" . $related_data["brand_brand_id"] . "' ");
                            $brand_data = $brand_rs->fetch_assoc();

                            if ($productImg_rs->num_rows > 0) {
                            ?>
                                <img src="<?php echo $productImg_data["img_path"]; ?>" alt="">
                            <?php
                            } else {
                            ?>
                                <img src="images\logo\logo1.png" alt="">
                            <?php
                            }

                            ?>

                            <div class="des">
                                <span><?php echo $brand_data["brand_name"]; ?></span>
                                <h5><?php echo $related_data["name"]; ?></h5>
                                <div class="star">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <h4>Rs.<?php echo $related_data["price"]; ?>.00</h4>
                            </div>
                            <a href="#"><i class="bi bi-cart-plus cart"></i></a>
                        </div>
                    <?php
                    }

                    ?>

                </div>
            </section>
            <!-- Product -->

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

<?php

    } else {
        echo ("Something Went Wrong.");
    }
} else {
    echo ("Please select a product first.");
}

?>