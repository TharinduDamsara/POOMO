<?php
include "connection.php";

$email = $_POST["e"];
$verification = $_POST["v"];

$user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `vcode` = '" . $verification . "' ");
$user_num = $user_rs->num_rows;

if ($user_num == 1) {

    echo ("success");
} else {
    echo ("Invalid Verification Code.");
}
