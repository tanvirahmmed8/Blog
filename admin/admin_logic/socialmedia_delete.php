<?php 
session_start();
$id = $_GET['id'];
// $id = 14;

if ($id) {
    include '../../include/db.php';
    $db = new DB;
    $table = 'socialmedias';
    $query = $db->delete($table, "id=$id");
    // $query = false;

    if($query){
        $_SESSION["delete_success"] = "<strong>Congratulations !</strong> Social Media deleted successfully!";
        header('location:../socialmedias.php');
    }else{
        $_SESSION["delete_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
        header('location:../socialmedias.php');
    }
    
}else{
    $_SESSION["delete_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
    header('location:../socialmedias.php');
}

?>