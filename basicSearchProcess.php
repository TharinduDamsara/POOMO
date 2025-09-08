<?php

include "connection.php";

$txt = $_POST["t"];

$query = "SELECT * FROM `product` ";

if (!empty($txt)) {
    $query != "WHERE `name` LIKE '%" . $txt . "%'";
}

?>

<!-- <div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

        </div>
    </div>
</div> -->

<!-- Product -->
<section class="product1">
    <h2>All Products</h2>
    <p>Start Fresh with Trendy Styles and Modern Fashion</p>
    <div class="pro-container">
        <?php
        $pageno;

        if ("0" != $_POST["page"]) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        $products_per_page = 3;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query . "LIMIT" . $products_per_page . "OFFSET" . $page_results . "");

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();
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

        <!-- pagination -->
        <section>
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" <?php
                                                if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                ?>
                            onclick="basicSearch(<?php echo ($pageno - 1); ?>);" ;
                            <?php
                                                }
                            ?>Previous></a>
                    </li>
                    <?php

                    for ($x = 1; $x <= $number_of_pages; $x++) {
                        if ($x == $pageno) {
                    ?>
                            <li class=" page-item active" aria-current="page">
                                <a class="page-link" onclick="basicSearch(<?php echo ($x); ?>);">
                                    <?php echo $x; ?>
                                </a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class=" page-item" aria-current="page">
                                <a class="page-link" onclick="basicSearch(<?php echo ($x); ?>);">
                                    <?php echo $x; ?>
                                </a>
                            </li>
                    <?php
                        }
                    }

                    ?>

                    <li class="page-item">
                        <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                ?>
                                                onclick="basicSearch(<?php echo ($pageno + 1); ?>);" ;
                                                <?php
                                                } ?>>Next</a>
                    </li>
                </ul>
            </nav>
        </section>
        <!-- pagination -->

    </div>
</section>
<!-- Product -->