<?php 
$user_id = $_POST['user_id'];
$search = $_POST['search'];

if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = "";
}

include '../../include/db.php';
$db = new DB;
date_default_timezone_set("Asia/Dhaka");
$con_msgs = $db->select('contact_msgs',"*",null,"name LIKE '%$search%'","created_at DESC");
$output = "";

foreach($con_msgs as  $con_msg){
    $date=new DateTime($con_msg['created_at']); 
    $today = date("M d");
    $mute = ($con_msg['action'] == 'read')?"text-muted":"";
    $active = ($con_msg['id'] == $id)?"border-right-3 border-right-primary":"bg-transparent";
    $dddd = (date_format($date,"M d") == $today)?"Today":date_format($date,"M d");
    $msg = mb_strimwidth($con_msg["massege"], 0, 80, "......");

    $output .= '<div class="list-group-item d-flex align-items-start '.$active.'">
    <div class="mr-3 d-flex flex-column align-items-center">
        <a href="#"
        class="avatar avatar-xs mb-2">
            <img src="assets/images/avatar/demi.png"
                alt="Avatar"
                class="avatar-img rounded-circle">
        </a>
    </div>
    <div class="flex">
        <p class="m-0" style="cursor: pointer;" onclick="LoadContactMsg('.$con_msg['id'].','.$user_id.')">
        <span class="d-flex align-items-center mb-1">
            <a href="#"
            class="text-dark-gray"><strong>'.$con_msg['name'].'</strong></a>
            <small class="ml-auto '.$mute.'">'.$dddd.'</small>
        </span>
        <span class="d-flex align-items-end">
        <span class="flex mr-3">
            <strong class="text-body mb-1 '.$mute.' ">'.$con_msg['subject'].'</strong></br>
            <small class="'.$mute.'" style="max-height: 2.5rem; overflow: hidden; position: relative; display: inline-block;">'.$msg.'</small>
        </span>
            <a class="d-flex text-decoration-none text-danger align-items-center mb-1" onclick="DeleteContactMsg('.$con_msg['id'].')"> 
                <i class="material-icons icon-14pt">delete</i>
            </a>
        </span>
    </p>
    </div>
    </div>';
}

echo $output;
?>


                  