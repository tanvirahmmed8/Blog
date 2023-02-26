<?php

if (isset($_POST['id'])) {
    include '../../include/db.php';
    $db = new DB;
    $table = 'contact_msgs';
    $id = $_POST['id'];
    $query = $db->delete($table,"id=$id");

    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
    
}else {
    echo 0;
}
