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

    <section class="feature">

        <?php

        $category_rs = Database::search("SELECT * FROM `category`");
        $category_num = $category_rs->num_rows;

        for ($x = 0; $x < $category_num; $x++) {
            $category_data = $category_rs->fetch_assoc();
        ?>
            <div class="fe-box" data-category="<?php echo $category_data["cat_name"]; ?>">
                <img src="<?php echo $category_data["cat_img_path"]; ?>" alt="">
                <h6><?php echo $category_data["cat_name"]; ?></h6>
            </div>
        <?php
        }

        ?>

    </section>

    <!-- <script src="bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.js"></script> -->
    <!-- <script src="script.js"></script> -->
</body>

</html>