<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | POOMO</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <link class="icon" rel="icon" href="images/logo/logo5.png" />
</head>

<body>
    <!-- Sidebar -->
    <div class="admin_sidebar">
        <div class="admin_logo">Admin Panel</div>
        <nav class="nav flex-column">
            <a class="admin_nav-link text-decoration-none" href="adminPanel.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a class="admin_nav-link text-decoration-none" href="addproduct.php"><i class="fas fa-tshirt"></i> Products</a>
            <a class="admin_nav-link text-decoration-none" href="#"><i class="fas fa-box"></i> Orders</a>
            <a class="admin_nav-link text-decoration-none" href="#"><i class="fas fa-users"></i> Customers</a>
            <a class="admin_nav-link text-decoration-none" href="#"><i class="fas fa-chart-bar"></i> Reports</a>
            <a class="admin_nav-link text-decoration-none" href="#"><i class="fas fa-cog"></i> Settings</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="admin_main-content">
        <!-- Navbar -->
        <nav class="admin_navbar">
            <a href="index.php" class="admin_navbar-brand text-decoration-none">
                <img src="images\logo\logo5.png" style="width: 40px; height: auto;" alt=""> POOMO</a>
            <a href="index.php" class="home_page"><i class="bi bi-house-door-fill"></i></a>
            <button class="admin_btn admin_btn-logout" onclick="signout();">Sign Out   <i class="fas fa-sign-out-alt"></i></button>
        </nav>

        <!-- content body -->
        <div class="ap_container">
            <h1>Update Products</h1>
            <form>
                <div class="ap_form-row">
                    <div class="ap_form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" disabled>
                            <option value="" disabled selected>Select a category</option>
                            <?php

                            $category_rs = Database::search("SELECT * FROM `category`");
                            $category_num = $category_rs->num_rows;

                            for ($x = 0; $x < $category_num; $x++) {
                                $category_data = $category_rs->fetch_assoc();

                            ?>
                                <option value="<?php echo $category_data["cat_id"]; ?>">
                                    <?php echo $category_data["cat_name"]; ?>
                                </option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="ap_form-group">
                        <label for="brand">Brand</label>
                        <select id="brand" name="brand" disabled>
                            <option value="" disabled selected>Select a brand</option>
                            <?php

                            $brand_rs = Database::search("SELECT * FROM `brand`");
                            $brand_num = $brand_rs->num_rows;

                            for ($x = 0; $x < $brand_num; $x++) {
                                $brand_data = $brand_rs->fetch_assoc();
                            ?>

                                <option value="<?php echo $brand_data["brand_id"]; ?>">
                                    <?php echo $brand_data["brand_name"]; ?>
                                </option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>
                </div>

                <div class="ap_form-group">
                    <label for="title">Product Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter product title">
                </div>

                <div class="ap_form-row">
                    <div class="ap_form-group">
                        <label for="color">Color</label>
                        <select id="color" name="color" disabled>
                            <option value="" disabled selected>Select a color</option>
                            <?php

                            $clr_rs = Database::search("SELECT * FROM `color` ");
                            $clr_num = $clr_rs->num_rows;

                            for ($x = 0; $x < $clr_num; $x++) {
                                $clr_data = $clr_rs->fetch_assoc();
                            ?>

                                <option value="<?php echo $clr_data["clr_id"]; ?>">
                                    <?php echo $clr_data["clr_name"]; ?>
                                </option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="ap_form-group">
                        <label for="new-color">Add New Color</label>
                        <div class="ap_add-color-row">
                            <input type="text" id="new-color" placeholder="Enter new color" disabled />
                            <button type="button" class="ap_add-color-btn" onclick="addNewColor()" disabled>Add</button>
                        </div>
                    </div>
                </div>

                <div class="ap_form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" min="0" name="quantity" placeholder="Enter quantity">
                </div>

                <div class="ap_form-group">
                    <label for="cost">Cost Per Item</label>
                    <input type="number" id="cost" min="0" name="cost" placeholder="Enter cost per item" disabled>
                </div>

                <div class="ap_form-row">
                    <div class="ap_form-group">
                        <label for="delivery-within">Delivery Cost (Within Colombo)</label>
                        <input type="number" id="delivery-within" min="0" name="delivery-within" placeholder="Enter delivery cost within city">
                    </div>
                    <div class="ap_form-group">
                        <label for="delivery-out">Delivery Cost (Out of Colombo)</label>
                        <input type="number" id="delivery-out" min="0" name="delivery-out" placeholder="Enter delivery cost out of city">
                    </div>
                </div>

                <div class="ap_form-group">
                    <label for="description">Product Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Enter product description"></textarea>
                </div>

                <div class="ap_image-upload">
                    <label for="images1" style="width: 100%; height: auto;">
                        + Upload Image 1
                        <input type="file" id="images1" name="image1" onchange="previewImage(event, 'image1')">
                        <img src="images/logo/logo1.png" id="image1" style="width: 90%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                    </label>
                    <label for="images2" style="width: 100%; height: auto;">
                        + Upload Image 2
                        <input type="file" id="images2" name="image2" onchange="previewImage(event, 'image2')">
                        <img src="images/logo/logo1.png" id="image2" style="width: 90%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                    </label>
                    <label for="images3" style="width: 100%; height: auto;">
                        + Upload Image 3
                        <input type="file" id="images3" name="image3" onchange="previewImage(event, 'image3')">
                        <img src="images/logo/logo1.png" id="image3" style="width: 90%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                    </label>
                    <label for="images4" style="width: 100%; height: auto;">
                        + Upload Image 4
                        <input type="file" id="images4" name="image4" onchange="previewImage(event, 'image4')">
                        <img src="images/logo/logo1.png" id="image4" style="width: 90%; height: auto; border-radius: 10px; margin-bottom: 15px;">
                    </label>

                </div>

                <button type="button" class="ap_submit-btn" onclick="addProduct();">Update Product</button>
            </form>
        </div>
        <!-- content body -->
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>