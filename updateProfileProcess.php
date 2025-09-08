<?php

session_start();
include "connection.php";

$email = $_SESSION["u"]["email"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$mobile = $_POST["m"];
$address = $_POST["a"];
$city = $_POST["c"];
$pcode = $_POST["p"];

$user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' ");

if ($user_rs->num_rows == 1) {

    Database::iud("UPDATE `user` SET `fname` = '" . $fname . "' , `lname` = '" . $lname . "' ,
    `mobile` = '" . $mobile . "' WHERE `email` = '" . $email . "' ");

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $email . "' ");

    if ($address_rs->num_rows == 1) {
        Database::iud("UPDATE `user_has_address` SET `city_city_id` = '" . $city . "' , `address` = '" . $address . "' ,
        `postal_code` = '" . $pcode . "' WHERE `user_email` = '" . $email . "' ");
    } else {
        Database::iud("INSERT INTO `user_has_address` 
        (`user_email`,`city_city_id`,`address`,`postal_code`) VALUES
        ('" . $email . "','" . $city . "','" . $address . "','" . $pcode . "') ");
    }

    if (sizeof($_FILES) == 1) {

        $image = $_FILES["i"];
        $image_extension = $image["type"];

        $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        if (in_array($image_extension, $allowed_image_extensions)) {

            $new_extension;

            if ($image_extension == "image/jpeg") {
                $new_extension = ".jpeg";
            } elseif ($image_extension == "image/png") {
                $new_extension = ".png";
            } elseif ($image_extension == "image/svg+xml") {
                $new_extension = ".svg";
            }

            $file_name = "images//profile_images//" . $email . "_" . uniqid() . $new_extension;
            move_uploaded_file($image["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $email . "' ");

            if ($image_rs->num_rows == 1) {
                Database::iud("UPDATE `profile_img` SET `img_path` = '" . $file_name . "' WHERE `user_email` = '" . $email . "' ");
                echo ("Profile Updated!");
            } else {
                Database::iud("INSERT INTO `profile_img`(`img_path`,`user_email`) VALUES ('" . $file_name . "' , '" . $email . "') ");
                echo ("Profile Saved");
            }
        } else {
            echo ("Invalid Image Type.");
        }
    } elseif (sizeof($_FILES) == 0) {
        echo ("You have not selected any Profile Image.");
    } else {
        echo ("You can upload only 1 file.");
    }
} else {
    echo ("Invalid User.");
}
