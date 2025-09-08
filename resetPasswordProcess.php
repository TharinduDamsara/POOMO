<?php

include "connection.php";

$email = $_POST["e"];
$newPw = $_POST["n"];
$retypepw = $_POST["r"];
$vcode = $_POST["v"];

if (!isset($newPw)) {
    echo ("Please Enter Your New Password.");
} else if (strlen($newPw) < 8) {
    echo ("Password must be at least 8 characters long.");
} elseif (!preg_match('/[0-9]/', $newPw)) {
    echo ("Password must contain at least one number.");
} elseif (!preg_match('/[a-z,A-Z]/', $newPw)) {
    echo ("Password must include at least one letter.");
} else if (empty($retypepw)) {
    echo ("Please Retype your New Password.");
} else if ($newPw != $retypepw) {
    echo ("The passwords do not match.");
} else {

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `vcode` = '" . $vcode . "' ");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        Database::iud("UPDATE `user` SET `password` = '" . $retypepw . "' WHERE `email` = '" . $email . "' AND `vcode` = '" . $vcode . "' ");
        echo ("success");
    } else {
        echo ("Invalid Verification Code.");
    }
}
