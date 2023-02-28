<?php 
session_start();
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");

include '../../include/db.php';
$db = new DB;
$table = 'logos';

$logos = $_FILES;

foreach ($logos as $logo_key => $logo_value) {
    $filename = $_FILES[$logo_key]['name'];
    
    if ($filename) {
        $uplodaded_file_explode = explode('.', $filename);
            $uplodaded_file_extention = end($uplodaded_file_explode);
            $new_name = $logo_key.".".$uplodaded_file_extention;
            $temp_location = $logos[$logo_key]['tmp_name'];
            $new_location = "../../uploads/logos/".$new_name;
            $exsisting_logo = $db->select($table,"logo_value",null,"logo_key='$logo_key'");
            if ($exsisting_logo[0]['logo_value']) {   
                unlink("../../uploads/logos/".$exsisting_logo[0]['logo_value']);
            }
            move_uploaded_file($temp_location, $new_location);
            print_r($exsisting_logo[0]['logo_value']);
        $update_query = $db->update($table,[
            'logo_value' => $new_name,
            'updated_at' => $now
        ], "logo_key='$logo_key'");
    }
}


$_SESSION["update_success"] = "<strong>Logo,</strong> Updated successfully!";
header('location: ../addlogo.php');
