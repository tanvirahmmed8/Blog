<?php 
session_start();
$id = $_GET['cat'];
// $id = 14;

if ($id) {
    include '../../include/db.php';
    $db = new DB;
    $table = 'categoris';
    $query = $db->softdelete($table, "id=$id");
    // $query = false;

    if($query){
        $_SESSION["delete_success"] = "<strong>Congratulations !</strong> Category deleted successfully!";
        header('location:../../category.php');
    }else{
        $_SESSION["delete_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
        header('location:../../category.php');
    }
    
}else{
    $_SESSION["delete_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
    header('location:../../category.php');
}

?>