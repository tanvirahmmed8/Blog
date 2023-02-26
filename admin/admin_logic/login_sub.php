<?php
session_start();
$em = trim($_POST['email']);
$email = htmlspecialchars(addslashes($em), ENT_QUOTES, "UTF-8");
$password = $_POST['password'];
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

if ($password) {
    
    
}else{
    $flag = true;
    $_SESSION["pass_error"] = "Please Input Password";
    
}





if ($flag) {
    
    header('location:../login.php');
}else{
    $epass = md5($password);
    include '../../include/db.php';
    $db = new DB;
    $table = 'users';
    $emai_pass = $db->countRows($table,"email='$email' AND password='$epass' AND action=1");
    
    // print_r($emai_pass);
    // die();
    if ($emai_pass == 1) {
        $user_role = $db->select($table,"role",null,"email='$email' AND password='$epass' AND action=1");
        if ($user_role[0]['role'] == 'admin' || $user_role[0]['role'] == 'creator') {
            $data = $db->select($table, "id,name", null, "email='$email' ");
            // print_r($data[0]['id']);
            // die();
            $_SESSION['s_id'] = $data[0]['id'];
            $_SESSION['s_email'] = $email;
            $_SESSION['s_name'] = $data[0]['name'];
            header('location:../index.php');
        } else {
            $_SESSION["emailpass_error"] = "<strong>Oops!</strong> User Can't Login here!";
            header('location:../login.php');
        }
        
    }else{
        $_SESSION["emailpass_error"] = "<strong>Oops!</strong> Invalid email or password.";
        header('location:../login.php');
    }
    
}
