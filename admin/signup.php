<?php
session_start();
include '../include/db.php';
$db = new DB;
include_once '../include/component.php';
?>

<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Signup</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <?php $fav_icon = $db->select('logos',"logo_value",null,"logo_key='fav_icon'"); ?>
        <link rel="icon" type="image/x-icon" href="../uploads/logos/<?=$fav_icon[0]['logo_value']?>">
        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="assets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="assets/css/app.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/app.rtl.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="assets/css/vendor-material-icons.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-material-icons.rtl.css"
              rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css"
              href="assets/css/vendor-fontawesome-free.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-fontawesome-free.rtl.css"
              rel="stylesheet">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!-- <script async
                src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-133433427-1');
        </script> -->

    </head>

    <body class="layout-login">

        <div class="layout-login__overlay"></div>
        <div class="layout-login__form bg-white"
             data-perfect-scrollbar>
            <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
                <a href="index.php"
                   class="navbar-brand"
                   style="min-width: 0">
                   <?php $header_logo = $db->select('logos',"logo_value",null,"logo_key='backend_logo'"); ?>
                    <img class="navbar-brand-icon"
                         src="../uploads/logos/<?=$header_logo[0]['logo_value']?>"
                         width="105"
                         alt="image not found">
                    <!-- <span>FlowDash</span> -->
                </a>
            </div>

            <h4 class="m-0">Sign up!</h4>
            <p class="mb-5">Create an account with FlowDash</p>
            <?php
                if (isset($_SESSION['register_error'])) {
                    $component->alert($_SESSION['register_error'],'danger');
                }
                unset($_SESSION['register_error']);
                // $component->alert("<strong>Oops !</strong> Something Wrong please try again!",'danger');
            ?> 
            <form action="admin_logic/signup_post.php"
                  method="POST"
                  novalidate>
                <div class="form-group">
                    <label class="text-label"
                           for="name_2">Name:</label>
                    <div class="input-group input-group-merge">
                        <input id="name_2"
                               type="text"
                               required=""
                               name="name"
                               class="form-control form-control-prepended"
                               value="<?= (isset($_SESSION['old_name'])) ? $_SESSION['old_name']: ""?>"
                               placeholder="John Doe">
                               
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-user"></span>
                            </div>
                        </div>
                        
                    </div>
                    <div id="emailHelp" class="form-text text-danger">
                            <?php
                            if (isset($_SESSION['name_error'])) {
                                echo $_SESSION['name_error'];
                            }
                            ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="email_2">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_2"
                               type="email"
                               required=""
                               name="email"
                               class="form-control form-control-prepended"
                               value="<?= (isset($_SESSION['old_email'])) ? $_SESSION['old_email']: ""?>"
                               placeholder="john@doe.com">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div id="emailHelp" class="form-text text-danger">
                            <?php
                            if (isset($_SESSION['email_error'])) {
                                echo $_SESSION['email_error'];
                            }
                            ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_2"
                               type="password"
                               required=""
                               name="password"
                               class="form-control form-control-prepended"
                               placeholder="Enter your password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div id="emailHelp" class="form-text text-danger" style="max-width: 300px;">
                            <?php
                            if (isset($_SESSION['password_error'])) {
                                echo $_SESSION['password_error'];
                            }
                            ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="password_2">Confirm Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_2"
                               type="password"
                               required=""
                               name="cpassword"
                               class="form-control form-control-prepended"
                               placeholder="Enter your Confirm password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div id="emailHelp" class="form-text text-danger">
                            <?php
                            if (isset($_SESSION['cpassword_error'])) {
                                echo $_SESSION['cpassword_error'];
                            }
                            ?>
                    </div>
                </div>
                <div class="form-group mb-5">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                               checked=""
                               name="terms"
                               class="custom-control-input"
                               id="terms" />
                        <label class="custom-control-label"
                               for="terms">I accept <a href="#">Terms and Conditions</a></label>
                    </div>
                    <div id="emailHelp" class="form-text text-danger">
                            <?php
                            if (isset($_SESSION['terms_error'])) {
                                echo $_SESSION['terms_error'];
                            }
                            ?>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary mb-2"
                            type="submit">Create Account</button><br>
                    <a class="text-body text-underline"
                       href="login.php">Have an account? Login</a>
                </div>
            </form>
        </div>

        <!-- jQuery -->
        <script src="assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/vendor/popper.min.js"></script>
        <script src="assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="assets/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="assets/js/toggle-check-all.js"></script>
        <script src="assets/js/check-selected-row.js"></script>
        <script src="assets/js/dropdown.js"></script>
        <script src="assets/js/sidebar-mini.js"></script>
        <script src="assets/js/app.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="assets/js/app-settings.js"></script>

    </body>

</html>

<?php
session_unset();
?>