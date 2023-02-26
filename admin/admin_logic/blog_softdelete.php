<?php 
session_start();
$id = $_GET['blog'];
// $id = 14;

if ($id) {
    include '../../include/db.php';
    $db = new DB;
    $table = 'blogs';
    $query = $db->softdelete($table, "id=$id");
    // $query = false;

    if($query){
        $_SESSION["delete_success"] = "<strong>Congratulations !</strong> Blogs deleted successfully!";
        header('location:../blog.php');
    }else{
        $_SESSION["delete_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
        header('location:../blog.php');
    }
    
}else{
    $_SESSION["delete_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
    header('location:../blog.php');
}

?>