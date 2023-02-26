<?php 
session_start();
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}else{
    $previous = "../index.php";
}

$email =$_POST['newsletter'];
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");
$flag = false;

if ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // echo $email."<br>";
    $_SESSION["old_email"] = $email;
    }else{
        $flag = true;
        $_SESSION["email_error"] = "Please Input a Valid E-Mail";
    }
    
}else{
    $flag = true;
    $_SESSION["email_error"] = "Please Input Your E-Mail";
}


if ($flag) {
    
    header('location:'.$previous);
}else{
    include '../include/db.php';
    $db = new DB;
    $table = 'newsletters';
    $email_duplicate = $db->sql("SELECT COUNT(*) AS validity FROM $table WHERE email = '$email'"); 
    
    // print_r($email_duplicate['0']['validity']);
    // die();
    if ($email_duplicate['0']['validity'] == 1) {
        $query = $db->update($table,[
            'email' => $email,
            'updated_at' => $now
        ],"email = '$email'");
        if ($query) {
            $_SESSION["register_success"] = "<strong>$name,</strong> Your account created successfully!";
            header('location:'.$previous);
        }else{
            $_SESSION["register_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
            header('location:'.$previous);
        }
   }else{
        $query = $db->insert($table,[
            'email' => $email,
            'created_at' => $now
        ]);
        if ($query) {
            $_SESSION["register_success"] = "<strong>$name,</strong> Your account created successfully!";
            header('location:'.$previous);
        }else{
            $_SESSION["register_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
            header('location:'.$previous);
        }
    }
}

 
