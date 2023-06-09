<?php
$blog_id = $_POST['blog_id'];

 include '../include/db.php';
 $db = new DB;
 $table = 'comments';

 $comments = $db->select($table,"*",null,"parent_id IS NULL AND blog_id=$blog_id","id DESC");
$count = $db->countRows($table,"blog_id=$blog_id");
$output = '<h3 class="commment-title">'.$count.' Comments('.$count.')</h3>';
    foreach($comments as $comment){
        $comment_id = $comment['id'];
        
        $date=new DateTime($comment['created_at']);
        
        $output .= '<div class="media">
        <img src="assets/images/comment/demi.png" width="50" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="mt-0">'.$comment["name"].' <span>'.date_format($date,"M d, Y").'</span>  <a class="reply-link" id="reply_'.$comment_id.'" onclick="reply('.$comment_id.','.$blog_id.')"><i class="fas fa-reply-all"></i>Reply</a></h5>
            '.$comment["comment"].'
            <div id="reply_area_'.$comment_id.'"></div>
        '.reply($db,$comment_id,$blog_id).'
        </div>
    </div> 
    
    ';
    }


    function reply($db,$comment_id,$blog_id){
        $table = 'comments';
        $replys = $db->select($table,"*",null,"parent_id=$comment_id","id DESC");
        $rep = "";
        foreach($replys as $reply){
            $date_rep=new DateTime($reply['created_at']);
            $rep .= '<div class="media">
            <img src="assets/images/comment/demi.png" width="50" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="mt-0">'.$reply["name"].' <span>'.date_format($date_rep,"M d, Y").'</span>  <a class="reply-link" id="reply_'.$reply["id"].'" onclick="reply('.$reply["id"].','.$blog_id.')"><i class="fas fa-reply-all"></i>Reply</a> </h5>
            '.$reply["comment"].'
        </div>
        </div>
        <div id="reply_area_'.$reply["id"].'"></div>
        '.reply($db,$reply["id"],$blog_id).'';
        }
        return $rep;
    }

    echo $output;
?>
