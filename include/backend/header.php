<?php 
session_start();
$err = false;
include '../include/component.php';
include '../include/db.php';
include '../include/myfunction.php';
$db = new DB;

date_default_timezone_set("Asia/Dhaka");


if (!isset($_SESSION['s_id'])) {
    header('location: login.php');
}
$brand = $db->select('settings','setting_value',null,"setting_name='brand_name'");
if (isset($title)) {
    # code...
}else{
    $title=$brand[0]['setting_value'];
}
// page link
$link = explode('/', $_SERVER['PHP_SELF']);
$page_name = end($link);
// // page link end
// require_once 'includes/db.php';
$user_id = $_SESSION['s_id'];
$role_check = $db->find('users',$user_id,'role');

// $profile_photo_name = "SELECT profile_photo FROM `users` WHERE id=$user_id";
// $profile_photo_name_from_db = mysqli_query($db_connect, $profile_photo_name);
// $profile_photo = mysqli_fetch_assoc($profile_photo_name_from_db)['profile_photo'];

// // phone number
// $phone_number_query = "SELECT phone_number FROM `users` WHERE id=$user_id";
// $phone_number_from_db = mysqli_query($db_connect, $phone_number_query);
// $phn = mysqli_fetch_assoc($phone_number_from_db)['phone_number'];
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
          <title><?=$brand[0]['setting_value']?>- <?=$title?></title>
          
          <!-- Prevent the demo from appearing in search engines -->
          <meta name="robots"
          content="noindex">
          
          <?php $fav_icon = $db->select('logos',"logo_value",null,"logo_key='fav_icon'"); ?>
  <link rel="icon" type="image/x-icon" href="../uploads/logos/<?=$fav_icon[0]['logo_value']?>">
  <link href="assets/summernote/summernote.min.css" rel="stylesheet">
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


    </head>   

    <body class="<?=($page_name == 'contact_msg.php')?"layout-fluid app-chat":"layout-default"?>">

        <!-- <div class="preloader"></div> -->
        <input type="text" id="ur" value="<?=$user_id?>" hidden>
        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Header -->

            <div id="header"
                 class="mdk-header js-mdk-header m-0"
                 data-fixed>
                <div class="mdk-header__content">

                    <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0"
                         id="navbar"
                         data-primary>
                        <div class="container-fluid p-0">

                            <!-- Navbar toggler -->

                            <button class="navbar-toggler navbar-toggler-right d-block d-lg-none"
                                    type="button"
                                    data-toggle="sidebar">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Navbar Brand -->
                            <a href="index.php"
                               class="navbar-brand ">
                               <?php $header_logo = $db->select('logos',"logo_value",null,"logo_key='backend_logo'"); ?>
                                <img src="../uploads/logos/<?=$header_logo[0]['logo_value']?>" alt="<?=$brand[0]['setting_value']?>" class="img-fluid">
                                <!-- <svg class="mr-2"
                                     xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor"
                                     style="width:20px;"
                                     viewBox="0 0 40 40">
                                    <path d="M40 34.16666667c.01-3.21166667-2.58333333-5.82333334-5.795-5.835-1.94-.00666667-3.75666667.955-4.84166667 2.565-.10166666.155-.295.22333333-.47166666.16666666L11.94 25.66666667c-.19-.06-.31-.245-.28833333-.44333334.01-.07333333.015-.14833333.015-.22333333 0-.06833333-.005-.13833333-.01333334-.20666667-.02166666-.20166666.105-.39.3-.44666666l17.96-5.13c.13833334-.04.28666667-.005.39333334.09166666 1.05.97333334 2.42833333 1.51666667 3.86 1.525C37.38833333 20.83333333 40 18.22166667 40 15s-2.61166667-5.83333333-5.83333333-5.83333333C32.52 9.17166667 30.95333333 9.87833333 29.86 11.11c-.11.12166667-.28.16833333-.43666667.11833333L11.91 5.65333333c-.16-.05-.27333333-.19166666-.28833333-.35833333-.30333334-3.20166667-3.14333334-5.55166667-6.345-5.24833333S-.275 3.19.02833333 6.39166667c.28166667 2.99333333 2.79833334 5.28 5.805 5.275 1.64666667-.005 3.21333334-.71333334 4.30666667-1.945.11-.12166667.28-.16833334.43666667-.11833334l16.57 5.27166667c.22.06833333.34166666.30333333.27166666.52333333-.04166666.13333334-.14833333.23833334-.28333333.275L9.90333333 20.59666667c-.13333333.03833333-.275.00833333-.38166666-.08-1.03333334-.86833334-2.33833334-1.34666667-3.68833334-1.35C2.61166667 19.16666667 0 21.77833333 0 25s2.61166667 5.83333333 5.83333333 5.83333333c1.355-.005 2.665-.485 3.7-1.35833333.10833334-.09166667.25833334-.12.39333334-.07666667l18.29 5.81833334c.14.04333333.24666666.15666666.28.3.75666666 3.13166666 3.90833333 5.05666666 7.04 4.3C38.14833333 39.185 39.99 36.85333333 40 34.16666667z" />
                                </svg> -->

                                <!-- <span>flowdash</span> -->
                            </a>

                            <form class="search-form d-none d-sm-flex flex"
                                  action="index.php">
                                <button class="btn"
                                        type="submit"><i class="material-icons">search</i></button>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Search">
                            </form>

                            <ul class="nav navbar-nav ml-auto d-none d-md-flex">
                                <li class="nav-item dropdown">
                                    <a href="#notifications_menu"
                                       class="nav-link dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false">
                                        <i class="material-icons nav-icon navbar-notifications-indicator">notifications</i>
                                    </a>
                                    <div id="notifications_menu"
                                         class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                                        <div class="dropdown-item d-flex align-items-center py-2">
                                            <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                            <a href="javascript:void(0)"
                                               class="text-muted"><small>Clear all</small></a>
                                        </div>
                                        <div class="navbar-notifications-menu__content"
                                             data-perfect-scrollbar>
                                            <div class="py-2">

                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <div class="avatar avatar-sm"
                                                             style="width: 32px; height: 32px;">
                                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg"
                                                                 alt="Avatar"
                                                                 class="avatar-img rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="">A.Demian</a> left a comment on <a href="">FlowDash</a><br>
                                                        <small class="text-muted">1 minute ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <a href="#">
                                                            <div class="avatar avatar-xs"
                                                                 style="width: 32px; height: 32px;">
                                                                <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="flex">
                                                        New user <a href="#">Peter Parker</a> signed up.<br>
                                                        <small class="text-muted">1 hour ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <a href="#">
                                                            <div class="avatar avatar-xs"
                                                                 style="width: 32px; height: 32px;">
                                                                <span class="avatar-title rounded-circle">JD</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                        <div>Hey, how are you? What about our next meeting</div>
                                                        <small class="text-muted">2 minutes ago</small>
                                                    </div>
                                                </div>

                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <div class="avatar avatar-sm"
                                                             style="width: 32px; height: 32px;">
                                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg"
                                                                 alt="Avatar"
                                                                 class="avatar-img rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="">A.Demian</a> left a comment on <a href="">FlowDash</a><br>
                                                        <small class="text-muted">1 minute ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <a href="#">
                                                            <div class="avatar avatar-xs"
                                                                 style="width: 32px; height: 32px;">
                                                                <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="flex">
                                                        New user <a href="#">Peter Parker</a> signed up.<br>
                                                        <small class="text-muted">1 hour ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <a href="#">
                                                            <div class="avatar avatar-xs"
                                                                 style="width: 32px; height: 32px;">
                                                                <span class="avatar-title rounded-circle">JD</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                        <div>Hey, how are you? What about our next meeting</div>
                                                        <small class="text-muted">2 minutes ago</small>
                                                    </div>
                                                </div>

                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <div class="avatar avatar-sm"
                                                             style="width: 32px; height: 32px;">
                                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg"
                                                                 alt="Avatar"
                                                                 class="avatar-img rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="">A.Demian</a> left a comment on <a href="">FlowDash</a><br>
                                                        <small class="text-muted">1 minute ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <a href="#">
                                                            <div class="avatar avatar-xs"
                                                                 style="width: 32px; height: 32px;">
                                                                <span class="avatar-title bg-purple rounded-circle"><i class="material-icons icon-16pt">person_add</i></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="flex">
                                                        New user <a href="#">Peter Parker</a> signed up.<br>
                                                        <small class="text-muted">1 hour ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item d-flex">
                                                    <div class="mr-3">
                                                        <a href="#">
                                                            <div class="avatar avatar-xs"
                                                                 style="width: 32px; height: 32px;">
                                                                <span class="avatar-title rounded-circle">JD</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="#">Big Joe</a> <small class="text-muted">wrote:</small><br>
                                                        <div>Hey, how are you? What about our next meeting</div>
                                                        <small class="text-muted">2 minutes ago</small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <a href="javascript:void(0);"
                                           class="dropdown-item text-center navbar-notifications-menu__footer">View All</a>
                                    </div>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                                <li class="nav-item dropdown">
                                    <a href="#account_menu"
                                       class="nav-link dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false">
                                        <span class="mr-1 d-flex-inline">
                                            <span class="text-light"><?= (isset($_SESSION['s_name'])) ? $_SESSION['s_name'] : "" ?></span>
                                        </span>
                                        <img src="assets/images/avatar/demi.png"
                                             class="rounded-circle"
                                             width="32"
                                             alt="Frontted">
                                    </a>
                                    <div id="account_menu"
                                         class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong><?= (isset($_SESSION['s_name'])) ? $_SESSION['s_name'] : "" ?></strong></div>
                                            <div class="text-muted"><?= (isset($_SESSION['s_email'])) ? $_SESSION['s_email'] : "" ?></div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item active"
                                           href="index.php"><i class="material-icons">dvr</i> Dashboard</a>
                                        <a class="dropdown-item"
                                           href="profile.html"><i class="material-icons">account_circle</i> My profile</a>
                                        <a class="dropdown-item"
                                           href="edit-account.html"><i class="material-icons">edit</i> Edit account</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"
                                           href="admin_logic/logout.php"><i class="material-icons">exit_to_app</i> Logout</a>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>

            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content">

                <div class="mdk-drawer-layout js-mdk-drawer-layout"
                     data-push
                     data-responsive-width="992px">
                    <div class="mdk-drawer-layout__content page">
