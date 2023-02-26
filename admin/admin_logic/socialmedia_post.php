<?php 
session_start();
$url = $_POST['socialmedialink'];
$icon = $_POST['socialmedia_icon'];
$flag = false;

if (!$url) {
    $_SESSION["url_error"] = "Please insart a URL!";
    $flag = true;
}
if (!$icon) {
    $_SESSION["icon_error"] = "Please insart a Icone class!";
    $flag = true;
}

if ($flag) {
    header('location:../socialmedias.php');
}else{
    include '../../include/db.php';
    $db = new DB;
    $table = 'socialmedias';
    $query = $db->insert($table,[
    'socialmedialink' => $url,
    'socialmedia_icon' => $icon
    ]);
    if ($query) {
        $_SESSION["success"] = "<strong>Social Media,</strong> added successfully!";
        header('location:../socialmedias.php');
    } else {
        $_SESSION["error"] = "<strong>Oops !</strong> Something Wrong please try again!";
        header('location:../socialmedias.php');
    }
    
   
}





// print_r($db->getResult());
