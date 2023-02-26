<?php 
session_start();
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");

include '../../include/db.php';
$db = new DB;
$table = 'settings';


$settings = $_POST;
foreach ($settings as $setting_name => $setting_value) {
    $cv_value = htmlentities($setting_value, ENT_QUOTES);
    $update_query = $db->update($table,[
        'setting_value' => $cv_value,
        'updated_at' => $now
    ], "setting_name='$setting_name'");

    //  "UPDATE settings SET setting_value='$cv_value' WHERE setting_name='$setting_name'";
    // mysqli_query($db_connect, $update_query);
}

$_SESSION["update_success"] = "<strong>Settings,</strong> Updated successfully!";
header('location: ../setting.php');


// $query = $db->insert($table,[
//     'setting_name' => "newsletter",
//     'created_at' => $now
// ]);

// print_r($db->getResult());
