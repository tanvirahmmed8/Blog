<?php

function viewCount($db, $where=null){
    $table = "visitor_counts";
    if($where != null){
        $count = $db->countRows($table, $where);
    }else{
        $count = $db->countRows($table);
    }
    return $count;
}
function commentCount($db, $where=null){
    $table = "comments";
    if($where != null){
        $count = $db->countRows($table, $where);
    }else{
        $count = $db->countRows($table);
    }
    return $count;
}
