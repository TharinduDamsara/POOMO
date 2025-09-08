<?php

session_start();
include "connection.php";


$category = $_POST["ca"];
$brand = $_POST["b"];
$title = $_POST["t"];
$clr = $_POST["clr"];
$qty = $_POST["qty"];
$cost = $_POST["cost"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];
$desc = $_POST["d"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$status = 1;
$email = "poomosrilanka@gmail.com";

Database::iud("INSERT INTO `product`(`name`,`description`,`price`,`qty`,`datetime_added`,`category_cat_id`,
`brand_brand_id`,`admin_email`,`color_clr_id`,`status_status_id`) VALUES ('" . $title . "','" . $desc . "','" . $cost . "','" . $qty . "','" . $date . "','" . $category . "','" . $brand . "',
'" . $email . "','" . $clr . "','" . $status . "')");

$product_id = Database::$connection->insert_id;
$length = sizeof($_FILES);

if ($length <= 4 && $length > 0) {
    $allowed_img_extensions = array("image/jpeg", "image/png", "image/svg+xml");

    for ($x = 1; $x <= $length; $x++) {
        if (isset($_FILES["image" . $x])) {
            $image_file = $_FILES["image" . $x];
            $file_extension = $image_file["type"];

            if (in_array($file_extension, $allowed_img_extensions)) {
                $new_image_extension;

                if ($file_extension == "image/jpeg") {
                    $new_image_extension = ".jpeg";
                } elseif ($file_extension == "image/png") {
                    $new_image_extension = ".png";
                } elseif ($file_extension == "image/svg+xml") {
                    $new_image_extension = ".svg";
                }

                $file_name = "images/products/" . $title . $x . uniqid() . $new_image_extension;
                move_uploaded_file($image_file["tmp_name"], $file_name);

                Database::iud("INSERT INTO `product_img`(`img_path`,`product_id`) VALUES
                ('" . $file_name . "','" . $product_id . "')");
            } else {
                echo ("Invalid Image Type.");
                exit();
            }
        }
    }

    echo ("success");
} else {
    echo ("Invalid Image Count.");
}
