<?php 
session_start();
$id = $_GET['blog'];

if ($id) {
    include '../../include/db.php';
    $db = new DB;
    $table = 'blogs';
    $query = $db->delete($table, "id=$id");
    // $query = false;

    if($query){
        $_SESSION["restore_success"] = "<strong>Congratulations !</strong> Blog deleted successfully!";
        header('location:../blog.php');
    }else{
        $_SESSION["restore_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
        header('location:../blog.php');
    }
    
}else{
    $_SESSION["restore_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
    header('location:../blog.php');
}

?>