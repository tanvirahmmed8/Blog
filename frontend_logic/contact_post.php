<?php
$con_name = $_POST['con_name'];
$con_subject = $_POST['con_subject'];
$con_email = $_POST['con_email'];
$con_massege = htmlentities($_POST['con_massege']);
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");

    include '../include/db.php';
    $db = new DB;
    $table = 'contact_msgs';

    $query = $db->insert($table,[
        'name' => $con_name,
        'email' => $con_email,
        'subject' => $con_subject,
        'massege' => $con_massege,
        'created_at' => $now
    ]);
    
    if ($query) {
        // $_SESSION["register_success"] = "<strong>$name,</strong> Your account created successfully!";
        // header('location:'.$previous);
        // echo "msg";
        echo 1;
        
    }else{
        // $_SESSION["register_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
        // header('location:'.$previous);
        echo 0;
    }

    ?>