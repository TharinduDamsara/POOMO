<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php

    session_start();

    if (isset($_SESSION["u"])) {
        $data = $_SESSION["u"];
        $email = $_SESSION["u"]["email"];
        $pageno;

        $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $email . "' ");
        $image_data = $image_rs->fetch_assoc();

        $admin = Database::search("SELECT * FROM `admin`");
        $admin_data = $admin->fetch_assoc();
        $user_admin = $admin_data["email"];

    ?>

        <!-- NavBar -->
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand order-lg-0 order-md-0 order-xl-0" href="index.php">
                    <img src="images/logo/logo5.png" alt="Logo" width="70" height="70" class="d-inline-block align-text-top">
                    <h1 class="d-inline-block align-text-top mt-3">P</h1>
                    <h1 id="bn" class="d-inline-block align-text-top mt-3">OO</h1>
                    <h1 class="d-inline-block align-text-top mt-3">MO</h1>
                </a>
                <div class="mobile order-lg-2 order-md-2 order-xl-2">
                    <a href="cart.php" class="text-dark"><i class="bi bi-cart2"></i></a>
                    <a href="#" class="text-dark"><i class="bi bi-list-ul" id="bar"></i></a>
                </div>
                <form class="d-flex order-lg-1 order-md-1 order-xl-1" role="search" id="shr">
                    <input class="form-control me-2" type="search" placeholder="Search in Poomo" aria-label="Search" id="basic_search">
                    <button class="btn btn-outline-warning" onclick="bacicSearch(0);"><i class="bi bi-search"></i></button>
                </form>

                <!-- mobile screen -->
                <ul class="nav order-lg-3" id="menu">
                    <li id="user_p">
                        <a href="profileSettings.php" class="cart">
                            <div class="mp">

                                <?php

                                if (empty($image_data["img_path"])) {
                                ?>
                                    <img src="images/logo/person.png" alt="Profile-Img" class="mpi">
                                <?php
                                } else {
                                ?>
                                    <img src="<?php echo $image_data["img_path"]; ?>" alt="Profile-Img" class="mpi">
                                <?php
                                }

                                ?>

                            </div>
                            <h4 class="text-center mt-2" style="font-size: 15px;"><?php echo $data["fname"] . ' ' . $data["lname"]; ?></h4>
                            <h6 class="text-center mb-4" style="font-size: 12px; margin-top: -5px;"><?php echo $data["email"]; ?></h6>
                        </a>
                    </li>
                    <li id="sign_p"><button type="button" id="sign_p" class="btn btn-warning btn-sm" onclick="signout();">
                            Sign Out
                        </button>
                    </li>
                    <!-- mobile screen -->

                    <li class="<?php echo $current_page == 'home' ? 'active' : ''; ?>"><a href="index.php">Home</a></li>
                    <li class="<?php echo $current_page == 'shop' ? 'active' : ''; ?>"><a href="shop.php">Shop</a></li>
                    <li class="<?php echo $current_page == 'blog' ? 'active' : ''; ?>"><a href="blog.php">Blog</a></li>
                    <li class="<?php echo $current_page == 'about' ? 'active' : ''; ?>"><a href="about.php">About</a></li>
                    <li><button id="sibtn" type="button" class="btn btn-warning btn-sm d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                            Sign In
                        </button></li>
                    <li class="<?php echo $current_page == 'cart' ? 'active' : ''; ?>">
                        <a href="cart.php" class="cart" id="lg_cart">
                            <i class="bi bi-cart2"></i>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown" id="dropdown">

                            <?php

                            if (empty($image_data["img_path"])) {
                            ?>
                                <img src="images/logo/person.png" alt="Profile-Img" class="profile-pic">
                            <?php
                            } else {
                            ?>
                                <img src="<?php echo $image_data["img_path"]; ?>" alt="Profile-Img" class="profile-pic">
                            <?php
                            }

                            ?>

                            <?php

                            if ($email == $user_admin) {
                            ?>
                                <div class="dropdown-content">
                                    <a href="adminPanel.php"><i class="bi bi-person-fill"></i> Admin Panel</a>
                                    <a href="#settings"><i class="bi bi-gear-fill"></i> Settings</a>
                                    <a href="#help"><i class="bi bi-question-diamond-fill"></i> Analytics</a>
                                    <hr class="mt-0 mb-0">
                                    <a href="#logout" onclick="signout();"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="dropdown-content">
                                    <a href="profileSettings.php"><i class="bi bi-person-fill"></i> View Profile</a>
                                    <a href="#settings"><i class="bi bi-gear-fill"></i> Settings</a>
                                    <a href="#help"><i class="bi bi-question-diamond-fill"></i> Help</a>
                                    <hr class="mt-0 mb-0">
                                    <a href="#logout" onclick="signout();"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
                                </div>
                            <?php
                            }

                            ?>

                        </div>
                    </li>
                    <a href="#" id="close"><i class="bi bi-x"></i></a>
                </ul>
            </div>
        </nav>
        <!-- NavBar -->

    <?php

    } else {

    ?>

        <!-- NavBar -->
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand order-lg-0 order-md-0 order-xl-0" href="index.php">
                    <img src="images/logo/logo5.png" alt="Logo" width="70" height="70" class="d-inline-block align-text-top">
                    <h1 class="d-inline-block align-text-top mt-3">P</h1>
                    <h1 id="bn" class="d-inline-block align-text-top mt-3">OO</h1>
                    <h1 class="d-inline-block align-text-top mt-3">MO</h1>
                </a>
                <div class="mobile order-lg-2 order-md-2 order-xl-2">
                    <a href="cart.php" class="text-dark"><i class="bi bi-cart2"></i></a>
                    <a href="#" class="text-dark"><i class="bi bi-list-ul" id="bar"></i></a>
                </div>
                <form class="d-flex order-lg-1 order-md-1 order-xl-1" role="search" id="shr">
                    <input class="form-control me-2" type="search" placeholder="Search in Poomo" aria-label="Search" id="basic_search">
                    <button class="btn btn-outline-warning" onclick="bacicSearch(0);"><i class="bi bi-search"></i></button>
                </form>

                <!-- mobile screen -->
                <ul class="nav order-lg-3" id="menu">
                    <li id="user_p">
                        <a href="#" class="cart">
                            <div class="mp mb-4">
                                <img src="images\logo\person.png" alt="Profile-Img" class="mpi">
                            </div>
                        </a>
                    </li>
                    <li id="sign_p"><button type="button" id="sign_p" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                            Sign In
                        </button>
                    </li>
                    <!-- mobile screen -->

                    <li class="<?php echo $current_page == 'home' ? 'active' : ''; ?>"><a href="index.php">Home</a></li>
                    <li class="<?php echo $current_page == 'shop' ? 'active' : ''; ?>"><a href="shop.php">Shop</a></li>
                    <li class="<?php echo $current_page == 'blog' ? 'active' : ''; ?>"><a href="blog.php">Blog</a></li>
                    <li class="<?php echo $current_page == 'about' ? 'active' : ''; ?>"><a href="about.php">About</a></li>
                    <li><button id="sibtn" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                            Sign In
                        </button></li>
                    <li class="<?php echo $current_page == 'cart' ? 'active' : ''; ?>">
                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop1" class="cart" id="lg_cart">
                            <i class="bi bi-cart2"></i>
                        </a>
                    </li>
                    <a href="#" id="close"><i class="bi bi-x"></i></a>
                </ul>
            </div>
        </nav>
        <!-- NavBar -->

    <?php
    }

    ?>

    <!-- Sign In -->
    <div class="signIn_Box">
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- SignIn Box -->
                    <div class="form_container" id="sign_in">
                        <i class="form-close btn-close form_close" data-bs-dismiss="modal" aria-label="Close"></i>
                        <div class="form login-form ">
                            <form action="#">
                                <h2>Welcome back</h2>

                                <?php

                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }
                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }

                                ?>

                                <div class="inputBox">
                                    <input value="<?php echo $email; ?>" type="email" placeholder="Enter Your Email" id="email2" />
                                    <i class="bi bi-envelope email"></i>
                                </div>
                                <div class="inputBox">
                                    <input value="<?php echo $password; ?>" type="password" placeholder="Enter Your password" id="password2" />
                                    <i class="bi bi-person-lock password"></i>
                                    <i class="bi bi-eye-slash eye" id="pwi" onclick="showPassword1();"></i>
                                </div>
                                <div class="option-field">
                                    <span class="checkbox">
                                        <input type="checkbox" class="form-check-input" id="check">
                                        <label for="check">Remember Me</label>
                                    </span>
                                    <a href="#" class="Forgot-pw" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="reset" onclick="forgotPassword();">Forgot Password?</a>
                                </div>
                                <button type="button" class="btn btn-warning signin-bt" onclick="signIn();">Sign In</button>
                                <div class="sign-up">
                                    Don't have an account?
                                    <a href="#" id="signup" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                        Sign Up
                                    </a>
                                </div>
                                <div class="divider">
                                    <span>OR login with social platforms</span>
                                </div>
                                <div class="social-i text-center">
                                    <a href="#"><i class="bi bi-google"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-apple"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- SignIn Box -->

                </div>
            </div>
        </div>
        <!-- modal -->
    </div>
    <!-- Sign In -->

    <!-- Sign Up -->
    <div class="signIn_Box">
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Sign Up -->
                    <div class="form_container" id="sign_up">
                        <i class="form-close btn-close form_close" data-bs-dismiss="modal" aria-label="Close"></i>
                        <div class="form login-form">
                            <form action="#">
                                <h2>Create an account</h2>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 col-md-6">
                                            <div class="inputBox">
                                                <input type="text" placeholder="First Name" id="fname" />
                                                <i class="bi bi-person email"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 col-md-6">
                                            <div class="inputBox">
                                                <input type="text" placeholder="Last Name" id="lname" />
                                                <i class="bi bi-person email"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="inputBox">
                                                <input type="email" placeholder="Email" id="email" />
                                                <i class="bi bi-envelope email"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="inputBox">
                                                <input type="password" placeholder="Password" id="password" />
                                                <i class="bi bi-person-lock password"></i>
                                                <i class="bi bi-eye-slash eye" id="pwi1" onclick="showPassword();"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="inputBox">
                                                <input type="text" placeholder="Mobile" id="mobile" />
                                                <i class="bi bi-phone email"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="inputBox">
                                                <select class="form-select" id="gender">

                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `gender`");
                                                    $num = $rs->num_rows;

                                                    for ($x = 0; $x < $num; $x++) {
                                                        $data = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $data["gender_id"]; ?>">
                                                            <?php echo $data["gender_name"]; ?>
                                                        </option>
                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-warning signin-bt" onclick="signUp();">Sign Up</button>
                                    <div class="sign-up">
                                        Already have an account?
                                        <a href="#" id="signup" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                            Sign In
                                        </a>
                                    </div>
                                    <div class="divider">
                                        <span>OR login with social platforms</span>
                                    </div>
                                    <div class="social-i text-center">
                                        <a href="#"><i class="bi bi-google"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-apple"></i></a>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!-- Sign Up -->

                </div>
            </div>
        </div>
        <!-- modal -->
    </div>
    <!-- Sign Up -->

    <!--Verification Modal -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modal-content">
                <i class="btn-close form_close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal();"></i>
                <div class="modal-body">
                    <h1>Enter Verification Code</h1>
                    <p>Please input the 6-digit code sent to your email.</p>
                    <div class="code-inputs">
                        <input type="text" maxlength="1" required id="1" class="code-input">
                        <input type="text" maxlength="1" required id="2" class="code-input">
                        <input type="text" maxlength="1" required id="3" class="code-input">
                        <input type="text" maxlength="1" required id="4" class="code-input">
                        <input type="text" maxlength="1" required id="5" class="code-input">
                        <input type="text" maxlength="1" required id="6" class="code-input">
                    </div>
                    <button class="btn-modern" onclick="verify();">Verify</button>
                    <p class="resend">Didn't get the code? <a onclick="forgotPassword();" href="#">Resend</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Modal -->
    <div class="modal fade" id="staticBackdrop3" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modal-content">
                <i class="form-close btn-close form_close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal();"></i>
                <div class="modal-body">
                    <h1>Reset Password</h1>
                    <p>Enter your new password below.</p>
                    <input class="r-input" type="password" placeholder="New Password" required id="newp">
                    <input class="r-input" type="password" placeholder="Confirm Password" required id="retp">
                    <button class="btn-modern m-2" onclick="resetModal1();">Reset Password</button>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="bootstrap.bundle.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="bootstrap.js"></script> -->
    <!-- <script src="script.js"></script> -->
</body>

</html>