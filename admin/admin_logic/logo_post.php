<?php 
session_start();
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");

include '../../include/db.php';
$db = new DB;
$table = 'logos';

        // $uplodaded_file_explode = explode('.', $uplodaded_file_name);
        // $uplodaded_file_extention = end($uplodaded_file_explode);

        // if ($uplodaded_file_extention) {
        //     $new_file_name = $post_id[0]."-".rand(999, 9999).time().".".$uplodaded_file_extention;
        //     $temp_location = $_FILES['image']['tmp_name'];
        //     $new_location = "../../uploads/blog_photos/".$new_file_name;
        //     move_uploaded_file($temp_location, $new_location);
        //     $db->update($table,['image'=>$new_file_name,'updated_at'=>$now],"id=$post_id[0]");

        //     $_SESSION["insert_success"] = "<strong>Blog,</strong> inserted successfully!";
        //     header('location:../blog.php');
        // }else{
        //     $_SESSION["insert_error"] = "<strong>Oops !</strong> Image not updated!";
        //     header('location:../blog.php');
        // }

$logos = $_FILES;

foreach ($logos as $logo_key => $logo_value) {
    $filename = $_FILES[$logo_key]['name'];
    if ($filename) {
        $uplodaded_file_explode = explode('.', $filename);
        $uplodaded_file_extention = end($uplodaded_file_explode);
        $new_name = $logo_key.".".$uplodaded_file_extention;
        $temp_location = $_FILES[$logo_key]['tmp_name'];
        $new_location = "../../uploads/logos/".$new_name;
        $exsisting_logo = $db->select($table,"logo_value",null,"logo_key='$logo_key'");
        if ($exsisting_logo[0]['logo_value']) {   
            unlink("../../uploads/logos/".$exsisting_logo[0]['logo_value']);
        }
        move_uploaded_file($temp_location, $new_location);
        $update_query = $db->update($table,[
            'logo_value' => $new_name,
            'updated_at' => $now
        ], "logo_key='$logo_key'");
    }
}

$_SESSION["update_success"] = "<strong>Logo,</strong> Updated successfully!";
header('location: ../addlogo.php');


// $query = $db->insert($table,[
//     'logo_key' => "newsletter",
//     'created_at' => $now
// ]);

// print_r($db->getResult());
