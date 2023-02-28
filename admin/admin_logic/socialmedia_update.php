<?php 
session_start();
$id = $_GET['id'];
$url = $_POST['socialmedialink'];
$icon = $_POST['socialmedia_icon'];

include '../../include/db.php';
$db = new DB;
$table = 'socialmedias';
$query = $db->update($table,[
'socialmedialink' => $url,
'socialmedia_icon' => $icon
], "id=$id");

if ($query) {
    $_SESSION["success"] = "<strong>Social Media,</strong> Updated successfully!";
    header('location:../socialmedias.php');
} else {
    $_SESSION["error"] = "<strong>Oops !</strong> Something Wrong please try again!";
    header('location:../socialmedias.php');
}