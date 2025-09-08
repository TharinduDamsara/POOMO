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
    $current_page = 'shop';
    include "header.php";
    ?>
    <!-- NavBar -->

    <!-- Header -->
    <section class="page-header">
        <h2>Stay Home</h2>
        <p>Enjoy your shopping spree from the comfort of your home!</p>
    </section>
    <!-- Header -->

    <!-- Category -->
    <?php
    include "category.php";
    ?>
    <!-- Category -->

    <!-- Product -->
    <section class="product1">
        <h2>All Products</h2>
        <p>Start Fresh with Trendy Styles and Modern Fashion</p>
        <div class="pro-container">

            <?php

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search("SELECT * FROM `product` WHERE `status_status_id`='1' ORDER BY `datetime_added` DESC ");
            $product_num = $product_rs->num_rows;

            $results_per_page = 16;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs = Database::search("SELECT * FROM `product` WHERE `status_status_id`='1' ORDER BY 
            `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_results . " ");

            $selected_num = $selected_rs->num_rows;
            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

                $brand_rs = Database::search("SELECT * FROM `brand` where `brand_id` = '" . $selected_data["brand_brand_id"] . "' ");
                $brand_data = $brand_rs->fetch_assoc();

                $category_rs2 = Database::search("SELECT * FROM `category` where `cat_id` = '" . $selected_data["category_cat_id"] . "' ");
                $category_data2 = $category_rs2->fetch_assoc();

            ?>
                <div class="pro" data-category="<?php echo $category_data2["cat_name"]; ?>" onclick="window.location.href='singleProduct.php?id=<?php echo $selected_data['id']; ?>'; ">
                    <?php

                    $productImg_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $selected_data["id"] . "' ");
                    $productImg_data = $productImg_rs->fetch_assoc();

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
                        <h5><?php echo $selected_data["name"]; ?></h5>
                        <div class="star">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h4>Rs.<?php echo $selected_data["price"]; ?>.00</h4>
                    </div>
                    <a href="#"><i class="bi bi-cart-plus cart"></i></a>
                </div>
            <?php
            }

            ?>


            <!-- <div class="pro">
                <img src="images\products\f2.jpg" alt="">
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
            </div> -->
        </div>
    </section>
    <!-- Product -->

    <!-- pagination -->
    <section>
        <nav aria-label="...">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a href="
                    <?php
                    if ($pageno <= 1) {
                        echo ("#");
                    } else {
                        echo "?page=" . ($pageno - 1);
                    }
                    ?>
                    " class="page-link">Previous</a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>">
                                <?php echo $x; ?>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>">
                                <?php echo $x; ?>
                            </a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" href="
                    <?php
                    if ($pageno >= $number_of_pages) {
                        echo ("#");
                    } else {
                        echo "?page=" . ($pageno + 1);
                    }
                    ?>
                    ">Next</a>
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