<?php
$name = $_POST['namer'];
$email = $_POST['emailr'];
$comment = htmlentities($_POST['commentr']);
$blog_id = $_POST['blog_id'];
$comment_id = $_POST['comment_id'];
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");

if(isset($_POST['namer']) && isset($_POST['emailr']) && isset($_POST['commentr'])){
    if($name != ""){
        if($email != ""){
            if ($comment != "") {
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
                    echo 1;
                    
                }else{
                    echo 0;
                }
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
    }else{
        echo 0;
    }
}else{
    echo 0;
}
    ?>