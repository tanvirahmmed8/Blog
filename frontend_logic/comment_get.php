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
        $replys = $db->select($table,"*",null,"parent_id=$comment_id AND blog_id=$blog_id","id DESC");
        $date=new DateTime($comment['created_at']);
        $rep = "";
        foreach($replys as $reply){
            $date_rep=new DateTime($reply['created_at']);
            $rep .= '<div class="media">
            <a class="mr-3" href="#">
            <img src="assets/images/blog/user.jpg" class="mr-3" alt="...">
        </a>
        <div class="media-body">
            <h5 class="mt-0">'.$reply["name"].' <span>'.date_format($date_rep,"M d, Y").'</span>  </h5>
            '.$reply["comment"].'
        </div>
        </div>
            
        
                   
           ';
        }
        $output .= '<div class="media">
        <img src="assets/images/blog/user.jpg" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="mt-0">'.$comment["name"].' <span>'.date_format($date,"M d, Y").'</span>  <a class="reply-link" id="reply_'.$comment_id.'" onclick="reply('.$comment_id.','.$blog_id.')"><i class="fas fa-reply-all"></i>Reply</a></h5>
            '.$comment["comment"].'
        '.$rep.'
        </div>
    </div> 
    
    <div id="reply_area_'.$comment_id.'"></div>
    ';
    }

    echo $output;
?>

<!--  -->