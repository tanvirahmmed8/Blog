<?php 
 session_start();
$name = $_POST['name'];
$slug = $_POST['slug'];
$id = $_GET['cat'];
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");
$flag = false;

if ($name) {
//    echo $name;
   if ($slug) {
    $slug = $slug;
   }else{
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
   }
}else{
    $_SESSION["name_error"] = "Name Can not be Empty!";
    $flag = true;
}


if ($flag) {  
    header('location:../category_edit.php?cat='.$id);
}else{
    include '../../include/db.php';
    $db = new DB;
    $table = 'categoris';
    $name_duplicate = $db->sql("SELECT COUNT(*) AS validity FROM $table WHERE name = '$name' && id <> $id");
    $slug_duplicate = $db->sql("SELECT COUNT(*) AS validity FROM $table WHERE slug = '$slug' && id <> $id");
    // $email_duplicate_result = mysqli_query($db_connect, $email_duplicate);
    
    // echo $slug;
    if ($name_duplicate['0']['validity'] == 1) {
        $_SESSION["name_error"] = "This Name Already exsist!";
        header('location:../category_edit.php?cat='.$id);
   }
    if ($slug_duplicate['0']['validity'] == 1) {
        $_SESSION["slug_error"] = "This slug Already exsist!";
        header('location:../category_edit.php?cat='.$id);
   }
        $query = $db->update($table,[
            'name' => $name,
            'slug' => $slug,
            'updated_at' => $now
        ],"id=$id");

        if ($query) {
            $_SESSION["insert_success"] = "<strong>$name,</strong> Update successfully!";
            header('location:../category_edit.php?cat='.$id);
        }else{
            $_SESSION["insert_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
            header('location:../category_edit.php?cat='.$id);
        }
   
}
?>