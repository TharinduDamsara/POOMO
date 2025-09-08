<?php

include "connection.php";


$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];


if (empty($fname)) {
    echo ("Please Enter Your First Name.");
} elseif (strlen($fname) > 50) {
    echo ("First Name Must Contain LOWER THAN 50 Characters.");
} elseif (empty($lname)) {
    echo ("Please Enter Your Last Name.");
} elseif (strlen($lname) > 50) {
    echo ("Last Name Must Contain LOWER THAN 50 Characters.");
} elseif (empty($email)) {
    echo ("Please Enter Your Email Address.");
} elseif (strlen($email) > 100) {
    echo ("Email Must Contain LOWER THAN 100 Characters.");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} elseif (empty($password)) {
    echo ("Please Enter Your Password.");
} elseif (strlen($password) < 8) {
    echo ("Password must be at least 8 characters long.");
} elseif (!preg_match('/[0-9]/', $password)) {
    echo ("Password must contain at least one number.");
} elseif (!preg_match('/[a-z,A-Z]/', $password)) {
    echo ("Password must include at least one letter.");
} elseif (empty($mobile)) {
    echo ("Please Enter Your Mobile Number.");
} elseif (strlen($mobile) != 10) {
    echo ("Mobile Number Must Contain 10 Characters.");
} elseif (!preg_match("/07[0,1,2,4.5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number.");
} else {


    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' OR `mobile` = '" . $mobile . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo "User With The Same Email Address or Mobile Number already exists.";
    } else {


        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");


        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        Database::iud("INSERT INTO `user` 
            (`fname`, `lname`, `email`, `password`, `mobile`, `joined_date`, `status_status_id`, `gender_gender_id`, `admin_email`) 
            VALUES 
            ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $password . "', '" . $mobile . "', '" . $date . "', '1', '" . $gender . "','poomosrilanka@gmail.com')");

        echo "success";
    }
}
