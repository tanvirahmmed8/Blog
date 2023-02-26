<?php
date_default_timezone_set("Asia/Dhaka");

if(isset($_POST['id'])){
    $id = $_POST['id'];
    if($id == null){
        echo '<div class="container-fluid page__container">
            <div class="d-flex align-items-center justify-content-center" style="height: 90vh;">
                <h2>Select a massege to show!</h2>
            </div>
        </div>';
       
    }else{
        $user_id = $_POST['user'];
        $now = date("Y-m-d H:i:s");
        include '../../include/db.php';
        $db = new DB;
        $table = 'contact_msgs';
        $db->update($table,[
            'action' => 'read',
            'reader_id' => $user_id,
            'updated_at' => $now
        ],"id=$id");
    
        $con_msg = $db->find($table,$id);
        if ($con_msg) {
            $date=new DateTime($con_msg['created_at']); $today = date("M d");
        (date_format($date,"M d") == $today)? $d = "Today": $d = date_format($date,"M d");
    
        echo '<div class="flex d-flex flex-column"
            data-perfect-scrollbar>
            <div class="d-flex align-items-center mb-3">
                <a href="#"
                class="avatar avatar-sm mr-3">
                    <img src="assets/images/avatar/demi.png"
                        alt="Avatar"
                        class="avatar-img rounded-circle">
                </a>
                <div class="flex">
                    <p class="m-0">
                        <span class="d-flex align-items-center">
                            <a href="#"
                            class="text-dark-gray"><strong>'.$con_msg['name'].'</strong></a>
                            <small class="ml-auto text-muted">'.$d.'</small>
                        </span>
                        <small class="flex">'.$con_msg['email'].'</small>
                    </p>
                </div>
            </div>
            <div class="d-flex align-items-center">
            
            <h1 class="h4 flex">'.$con_msg['subject'].'</h1>
            </div>
            <div class="d-flex align-items-center">
                <div class="flex mr-3">
                    <p>'.$con_msg['massege'].'</p>
                </div>
                <div class="text-center ml-3">
                
                </div>
            </div>
        </div>';
        } else {
            echo "Something wrong no data";
        }
        
    }

}else{
    echo "Something wrong";
}

