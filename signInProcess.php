<?php

session_start();
include "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberMe = $_POST["r"];

if (empty($email)) {
    echo ("Please Enter Your Email Address.");
} elseif (strlen($email) > 100) {
    echo ("Email Must Contain LOWER THAN 100 Characters.");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} elseif (empty($password)) {
    echo ("Please Enter Your Password.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        echo ("success");
        $data = $rs->fetch_assoc();
        $_SESSION["u"] = $data;

        if ($rememberMe == "true") {
            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("password", $password, time() + (60 * 60 * 24 * 365));
        }
    } else {
        echo ("Invalid Email Address or Password");
    }
}
