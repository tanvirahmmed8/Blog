<?php

$name = $_POST['namer'];
$email = $_POST['emailr'];
$comment = htmlentities($_POST['commentr']);
$blog_id = $_POST['blog_id'];
$comment_id = $_POST['comment_id'];
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
        'parent_id' => $comment_id,
        'created_at' => $now
    ]);
    if ($query) {
        // $_SESSION["register_success"] = "<strong>$name,</strong> Your account created successfully!";
        header('location:../blog-single.php?bb='.$blog_id);
        // echo "msg";
        // echo 1;
        
    }else{
        // $_SESSION["register_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
        header('location:../blog-single.php?bb='.$blog_id);
        // echo 0;
    }

    ?>