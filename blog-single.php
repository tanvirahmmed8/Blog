<?php
$title="Blog Single";
require_once 'include/frontend/header.php';
?>
<?php 
if(isset($_GET['bb'])){
    $b_id = $_GET['bb'];
}else{
    $b_id = 1;
    // header('location:index.php');
}
$blog = $db->find('blogs',$b_id);
?>
<?php $date=new DateTime($blog['created_at']);?>
<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1><?=$blog['title']?></h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="index.php">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Blog Single
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>

		
<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
        		<div class="post-single">
    <div class="post-thumb">
        <img src="uploads/blog_photos/<?=$blog['image']?>" alt="" class="img-fluid">
    </div>

   <div class="single-post-content">
        <div class="post-meta mt-4">
            <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i><?=date_format($date,"M d, Y h:i:s A");?></span>
            <span class="post-comment"><i class="fa fa-comments mr-2"></i><?php $blog_id=$blog['id']; echo $count = $db->countRows('comments',"blog_id=$blog_id");?> Comment</span>
            <?php $blog_user_id = $blog['user_id'];?>
            <?php $user_b = $db->find('users',$blog['user_id'], "name,role");?>
            <span><a href="#" class="post-author"><i class="fa fa-user mr-2"></i><?=$user_b['role']."-".$user_b['name'];?></a></span>
        </div>
        <p><?php echo htmlspecialchars_decode(stripslashes($blog['blog']));?></p>
        <!-- <p><?//=$blog['blog'];?></p> -->
   </div>

    <div class="single-tags">
        <?php $tags = explode(',',$blog['tag']); ?>
        <?php foreach($tags as $tag): ?>
            <a href="taglinks.php?tag=<?=$tag?>">#<?=$tag;?></a>
        <?php endforeach; ?>
    </div>


    <div class="row align-items-center justify-content-between blog-navigation"  id="com">
        <div class="col-lg-6 border-right">
            <?php $b_p = $db->find('blogs',$blog['id']-1); ?>
            <?php if($b_p):?>
            <a href="blog-single.php?blog=<?=$b_p['blog_uri']?>&bb=<?=$b_p['id'];?>" class="prev-post">
                <span>- Previous Posts</span>
                <?=$b_p['title']?>
            </a>
            <?php endif;?>
        </div>
        <div class="col-lg-6">
            <?php $b_n = $db->find('blogs',$blog['id']+1); ?>
            <?php if($b_n):?>
            <a href="blog-single.php?blog=<?=$b_n['blog_uri']?>&bb=<?=$b_n['id'];?>" class="next-post">
                <span>- Next post</span>
                <?=$b_n['title']?>
            </a>
            <?php endif;?>
        </div>
    </div>

    <!-- <div class="author">
        <div class="author-img">
            <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
        </div>
        <div class="author-info">
            <h4>Mikel John</h4>
            <p>Web Developer</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia enim nihil accusamus error perspiciatis nam quas distinctio nobis, quibusdam mollitia totam ipsam obcaecati, iusto alias reprehenderit tempora placeat voluptates eligendi.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            </ul>
        </div>
    </div> -->
    
     <div class="comments"></div>

    <div class="reply_error"></div>
    <div class="comments-form p-5 mt-4" id="c-i-d">
        <h3>Leave a comment </h3>
        <p>Your email address will not be published. Required fields are marked *</p>
        
        <div id="form_error"></div>
        <form id="commentForm" class="comment_form">
            <div class="row form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea id="comment" cols="30" rows="6" placeholder="Comment" class="form-control"></textarea>
                    </div>
                    <div id="comment_error" class="text-danger"></div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" id="name" class="form-control" placeholder="Name">
                        <input type="text" hidden id="blog_id" value="<?=$blog['id']?>">
                    </div>
                    <div id="name_error" class="text-danger"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"> 
                        <input type="email" id="email" class="form-control"  placeholder="Email">
                    </div>
                    <div id="email_error" class="text-danger"></div>
                </div>
                 <div class="col-lg-12">
                    <div class="form-group">
                        <button id="save_comment" type="submit" class="btn btn-main">Comment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>    

</div>
</div>

<?php
require_once 'include/frontend/right_side.php';
require_once 'include/frontend/footer.php';
?>