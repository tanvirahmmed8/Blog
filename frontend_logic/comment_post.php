<?php

$name = $_POST['name'];
$email = $_POST['email'];
$comment = htmlentities($_POST['comment']);
$blog_id = $_POST['blog_id'];
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");

    include '../include/db.php';
    $db = new DB;
    $table = 'comments';

    $query = $db->insert($table,[
        'name' => $name,
        'email' => $email,
        'comment' => $comment,
        'blog_id' => $blog_id,
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