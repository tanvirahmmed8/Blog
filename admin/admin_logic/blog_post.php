<?php
session_start();
$title = htmlentities($_POST['title'], ENT_QUOTES);
$blog = htmlentities($_POST['blog'], ENT_QUOTES);
$short_dec = htmlentities($_POST['short_dec'], ENT_QUOTES);
$cat_id = $_POST['cat_id'];
$tag = strtolower($_POST['tag']);
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");
$flag = false;

$filename = $_FILES['image']['tmp_name'];

if (file_exists($filename)) {
    // echo "The file $filename exists";
} else {
    // $_SESSION["image_error"] = "Please select an Image";
    // $flag = true;
}

if ($title) {
    $_SESSION["old_title"] = $title;
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))); 
}else{
    $flag = true;
    $_SESSION["title_error"] = "Please Input Title";
}

if ($blog) {   
    $_SESSION["old_blog"] = $blog; 
}else{
    $flag = true;
    $_SESSION["blog_error"] = "Please Input Blog Description";
    
}
if ($short_dec) {   
    $_SESSION["old_short_dec"] = $short_dec; 
}else{
    $flag = true;
    $_SESSION["short_dec_error"] = "Please Input Short Description";
    
}
if (!$cat_id) {    
    $flag = true;
    $_SESSION["cat_id_error"] = "Please Select One Category";
}
if ($tag) {    
    // $flag = true;
    $_SESSION["old_tag"] = $tag;
}



if ($flag) {   
    header('location:../blog.php');
}else{

    include '../../include/db.php';
    $db = new DB;
    $table = 'blogs';
    $query = $db->insert($table,[
        'title' => $title,
        'blog_uri' => $slug,
        'blog' => $blog,
        'short_dec' => $short_dec,
        'cat_id' => $cat_id,
        'tag' => $tag,
        'user_id' => $_SESSION['s_id'],
        'created_at' => $now
    ]);
    if ($query) {
        $post_id = $db->getResult();
        $uplodaded_file_name = $_FILES['image']['name']; 
        $uplodaded_file_explode = explode('.', $uplodaded_file_name);
        $uplodaded_file_extention = end($uplodaded_file_explode);

        if ($uplodaded_file_extention) {
            $new_file_name = $post_id[0]."-".rand(999, 9999).time().".".$uplodaded_file_extention;
            $temp_location = $_FILES['image']['tmp_name'];
            $new_location = "../../uploads/blog_photos/".$new_file_name;
            move_uploaded_file($temp_location, $new_location);
            $db->update($table,['image'=>$new_file_name,'updated_at'=>$now],"id=$post_id[0]");

            $_SESSION["insert_success"] = "<strong>Blog,</strong> inserted successfully!";
            header('location:../blog.php');
        }else{
            $_SESSION["insert_error"] = "<strong>Blog Inserted!</strong> without Image!";
            header('location:../blog.php');
        }
        //with out img
        $_SESSION["old_title"] = "";
        $_SESSION["old_blog"] = ""; 
        $_SESSION["old_short_dec"] = ""; 
        $_SESSION["old_tag"] = "";
        //with out img

    }else{
        $_SESSION["insert_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
            header('location:../blog.php');
    }

    

}
