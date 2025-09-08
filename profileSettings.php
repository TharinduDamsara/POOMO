<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings | POOMO</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
    <link class="icon" rel="icon" href="images/logo/logo5.png" />
</head>

<body>

    <!-- NavBar -->
    <?php
    include "header.php";
    ?>
    <!-- NavBar -->

    <?php
    if (isset($_SESSION["u"])) {

        $email = $_SESSION["u"]["email"];

        $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
        user.gender_gender_id = gender.gender_id WHERE `email` = '" . $email . "' ");

        $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON
        user_has_address.city_city_id = city.city_id INNER JOIN `district` ON
        city.district_district_id = district.district_id INNER JOIN `province` ON
        district.province_province_id = province.province_id WHERE `user_email` = '" . $email . "' ");

        $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $email . "' ");

        $details_data = $details_rs->fetch_assoc();
        $address_data = $address_rs->fetch_assoc();
        $image_data = $image_rs->fetch_assoc();

    ?>

        <div class="profile-container">
            <div class="profile-sidebar">

                <?php

                if (empty($image_data["img_path"])) {
                ?>
                    <img src="images/logo/person.png" id="p_image" alt="Profile Picture">
                <?php
                } else {
                ?>
                    <img src="<?php echo $image_data["img_path"]; ?>" id="p_image" alt="Profile Picture">
                <?php
                }

                ?>

                <h3><?php echo $details_data["fname"] . " " . $details_data["lname"]; ?></h3>
                <p><?php echo $email; ?></p>
                <button onclick="changeProfileImg();">
                    <input type="file" class="d-none" id="profileimage" />
                    <label for="profileimage">Upload Profile Image</label>
                </button>

            </div>
            <div class="profile-details">
                <h2>Profile Settings</h2>
                <form id="profile-form">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" value="<?php echo $details_data["fname"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" value="<?php echo $details_data["lname"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" id="p_mobile" value="<?php echo $details_data["mobile"]; ?>">
                    </div>
                    <div class="form-group" style="position: relative;">
                        <label for="password">Password</label>
                        <input type="password" id="p_password" value="<?php echo $details_data["password"]; ?>" style="padding-right: 40px; width: 100%;" disabled>
                        <i class="bi bi-eye-slash" id="toggle-password" onclick="profilePassword();"></i>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="<?php echo $details_data["email"]; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="registered-date">Registered Date</label>
                        <input type="text" id="registered-date" value="<?php echo $details_data["joined_date"]; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>

                        <?php
                        if (empty($address_data["address"])) {
                        ?>
                            <input type="text" id="address" placeholder="Type Address">
                        <?php
                        } else {
                        ?>
                            <input type="text" id="address" value="<?php echo $address_data["address"]; ?>">
                        <?php
                        }
                        ?>

                    </div>

                    <?php

                    $province_rs = Database::search("SELECT * FROM `province` ");
                    $district_rs = Database::search("SELECT * FROM `district` ");
                    $city_rs = Database::search("SELECT * FROM `city` ");

                    ?>

                    <div class="form-group">
                        <label for="province">Province</label>
                        <select id="province" onchange="selectDistrict();">
                            <option value="0" disabled selected>Select Province</option>
                            <?php

                            for ($x = 0; $x < $province_rs->num_rows; $x++) {
                                $province_data = $province_rs->fetch_assoc();
                            ?>

                                <option value="<?php echo $province_data["province_id"]; ?>"
                                    <?php

                                    if (!empty($address_data["province_id"])) {
                                        if ($province_data["province_id"] == $address_data["province_id"]) {
                                    ?> selected <?php
                                            }
                                        }

                                                ?>>
                                    <?php echo $province_data["province_name"]; ?>
                                </option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district">District</label>
                        <select id="district" onchange="selectCity();">
                            <option value="0" disabled selected>Select District</option>
                            <?php

                            for ($x = 0; $x < $district_rs->num_rows; $x++) {
                                $district_data = $district_rs->fetch_assoc();
                            ?>

                                <option value="<?php echo $district_data["district_id"]; ?>"
                                    <?php

                                    if (!empty($address_data["district_id"])) {
                                        if ($district_data["district_id"] == $address_data["district_id"]) {
                                    ?> selected <?php
                                            }
                                        }

                                                ?>>
                                    <?php echo $district_data["district_name"]; ?>
                                </option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select id="city">
                            <option value="0" disabled selected>Select City</option>
                            <?php

                            for ($x = 0; $x < $city_rs->num_rows; $x++) {
                                $city_data = $city_rs->fetch_assoc();
                            ?>

                                <option value="<?php echo $city_data["city_id"]; ?>"
                                    <?php

                                    if (!empty($address_data["city_id"])) {
                                        if ($city_data["city_id"] == $address_data["city_id"]) {
                                    ?> selected <?php
                                            }
                                        }

                                                ?>>
                                    <?php echo $city_data["city_name"]; ?>
                                </option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postal-code">Postal Code</label>

                        <?php

                        if (empty($address_data["postal_code"])) {
                        ?>
                            <input type="text" id="postal-code" placeholder="Enter Your Postal Code">
                        <?php
                        } else {
                        ?>
                            <input type="text" id="postal-code" value="<?php echo $address_data["postal_code"]; ?>">
                        <?php
                        }

                        ?>

                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" value="<?php echo $details_data["gender_name"]; ?>" disabled>
                    </div>
                    <div class="form-actions pt-2">
                        <button type="button" id="update-profile" onclick="updateProfile();">Update My Profile</button>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }
    ?>

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