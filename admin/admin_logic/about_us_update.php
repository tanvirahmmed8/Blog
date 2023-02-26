<?php
session_start();
$about_us = htmlentities($_POST['about_us'], ENT_QUOTES);
$id = $_POST['id'];
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");
$flag = false;

// if ($name) {
//     $_SESSION["old_name"] = $name;    
// }else{
//     $flag = true;
//     $_SESSION["name_error"] = "Please Input Your Name";
//     // header('location:register.php');
// }

if ($flag) {
    
    header('location:../about_us.php');
}else{
    include '../../include/db.php';
    $db = new DB;
    $table = 'about_us';
   
        $query = $db->update($table,[
            'about_us' => $about_us,
            'updated_at' => $now
        ],"id=$id");

        if ($query) {
            $_SESSION["update_success"] = "<strong>Congratulations,</strong> Updated successfully!";
            header('location:../about_us.php');
        }else{
            $_SESSION["update_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
            header('location:../about_us.php');
        }
}

 
