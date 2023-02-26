<?php 
session_start();
$id = $_GET['cat'];
// $id = 14;

if ($id) {
    include '../../include/db.php';
    $db = new DB;
    $table = 'categoris';
    $query = $db->delete($table, "id=$id");
    // $query = false;

    if($query){
        $_SESSION["restore_success"] = "<strong>Congratulations !</strong> Category deleted successfully!";
        header('location:../category.php');
    }else{
        $_SESSION["restore_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
        header('location:../category.php');
    }
    
}else{
    $_SESSION["restore_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
    header('location:../category.php');
}

?>