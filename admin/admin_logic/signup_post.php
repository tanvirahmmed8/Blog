<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d H:i:s");
$flag = false;

if(!isset($_POST['terms'])){
    $flag = true;
    $_SESSION["terms_error"] = "You need to accept Terms and Conditions";  
}

if ($name) {
    $_SESSION["old_name"] = $name;    
}else{
    $flag = true;
    $_SESSION["name_error"] = "Please Input Your Name";
    // header('location:register.php');
}

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
    $_SESSION["password_error"] = "Please Input Your Password";
}

if ($cpassword) {
    if ($password == $cpassword) {
        // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $flag = true;
        $_SESSION["password_error"] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }else{
    // echo 'Strong password='.$password."<br>";
    }
    }else{
        $flag = true;
        $_SESSION["cpassword_error"] = "Your Password did not Match";
    }

}else{
    $flag = true;
    $_SESSION["cpassword_error"] = "Please Input Your Confirm Password";
}

if ($flag) {
    
    header('location:../signup.php');
}else{
    $epassword = md5($password);
    include '../../include/db.php';
    $db = new DB;
    $table = 'users';
    $email_duplicate = $db->sql("SELECT COUNT(*) AS validity FROM users WHERE email = '$email'"); 
    
    if ($email_duplicate['0']['validity'] == 1) {
        $_SESSION["email_error"] = "This Mail Already have an account.";
        header('location:../signup.php');
   }else{
        $query = $db->insert($table,[
            'name' => $name,
            'email' => $email,
            'password' => $epassword,
            'role' => 'admin',
            'created_at' => $now
        ]);
        if ($query) {
            $_SESSION["register_success"] = "<strong>$name,</strong> Your account created successfully!";
            header('location:../login.php');
        }else{
            $_SESSION["register_error"] = "<strong>Oops !</strong> Something Wrong please try again!";
            header('location:../signup.php');
        }
    }
}

 
