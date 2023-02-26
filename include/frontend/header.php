<?php
include 'include/db.php';
// include 'include/myfunction.php';
$db = new DB;
$phn = $db->select('settings','setting_value',null,"setting_name='phone_number'");
$email = $db->select('settings','setting_value',null,"setting_name='email_address'");
$office_add = $db->select('settings','setting_value',null,"setting_name='office_address'");
$brand = $db->select('settings','setting_value',null,"setting_name='brand_name'");
$socials = $db->select('socialmedias');

if (isset($title)) {
    # code...
}else{
    $title=$brand[0]['setting_value'];
}
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themeturn.com/tf-db/edutim/edutim/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Dec 2022 20:30:00 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- <meta name="description" content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  "> -->
  
  <!-- <meta name="author" content="themeturn.com"> -->

  <title><?=$brand[0]['setting_value']?>- <?=$title?></title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $fav_icon = $db->select('logos',"logo_value",null,"logo_key='fav_icon'"); ?>
  <link rel="icon" type="image/x-icon" href="uploads/logos/<?=$fav_icon[0]['logo_value']?>">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
  <link rel="stylesheet" href="assets/vendors/bicon/css/bicon.min.css">
  <link rel="stylesheet" href="assets/vendors/themify/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-layouts.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-small-screen.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce.css">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <style>
    .reply-link{
        cursor: pointer;
    }
  </style>

</head>

<body id="top-header">

  

    
<header>
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <ul class="header-contact">
                        <li>
                            <span>Call :</span>
                            <?=$phn[0]['setting_value'];?>
                        </li>
                        <li>
                            <span>Email :</span>
                            <?=$email[0]['setting_value'];?>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header-right float-right">
                        <div class="header-socials">
                            <ul>
                            <?php foreach($socials as $social): ?>
                                <li><a href="<?=$social['socialmedialink']?>"><i class="<?=$social['socialmedia_icon']?>"></i></a></li>
                            <?php endforeach; ?>
                                <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fab fa-linkedin"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fab fa-pinterest"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="header-btn">
                            <!-- <a href="login-registration.php" class="btn btn-main btn-small"><i class="fa fa-user mr-2"></i>Login / Register</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
<!-- menu include hare -->
<?php
require_once 'menu.php';
?>
<!-- menu include hare -->


</header>

        

 <!--search overlay start-->
 <div class="search-wrap">
    <div class="overlay">
        <form action="search.php" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" name="search" class="form-control" value="<?=(isset($search))? $search:""?>" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right"> 
                        <div class="search_toggle toggle-wrap d-inline-block mb-4">
                            <img class="search-close" src="assets/images/close.png" srcset="assets/images/close@2x.png 2x" alt=""/>
                        </div><br>
                        <div class="text-left">
                            <button  class="header-search" type="submit"><i class="fa fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->

