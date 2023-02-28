<?php
$title="Blog";
require_once 'include/frontend/header.php';
?>

<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Blog</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Blog
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
        <?php
         $perPage = 3; // Number of items per page
         $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // Current page
         $offset = ($page - 1) * $perPage; // Offset for pagination
          $blogs = $db->select('blogs','*',null,'deleted_at IS NULL',"created_at DESC",$perPage,$offset);
        ?>
        <?php foreach($blogs as $blog): ?>
          <article class="blog-post-item">
            <div class="post-thumb">
              <img src="uploads/blog_photos/<?=$blog['image']?>" alt="" class="img-fluid">
            </div>
            <div class="post-item mt-4">
              <div class="post-meta"> <?php $date=new DateTime($blog['created_at']);?>
                <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i> <?=date_format($date,"M d, Y h:i:s A");?></span>
                <?php $blog_user_id = $blog['user_id'];?>
                <?php $user_b = $db->select('users', "name,role", null, "id='$blog_user_id' ");?>
                <span class="post-author"><i class="fa fa-user mr-2"></i><?=$user_b[0]['role']."-".$user_b[0]['name'];?></span>
                <span><a href="blog-single.php?blog=<?=$blog['blog_uri']?>&bb=<?=$blog['id']?>#com" class="post-comment"><i class="fa fa-comments mr-2"></i><?php $blog_id=$blog['id']; echo commentCount($db,"blog_id=$blog_id")?> Comment</a></span>
              </div>
              <h2 class="post-title"><a href="blog-single.php?blog=<?=$blog['blog_uri']?>&bb=<?=$blog['id']?>"><?=$blog['title']?></a></h2>
              <div class="post-content">
                <!-- <p><?//=substr($blog['blog'], 0, 150) . '...';?></p> -->
                <!-- <p><?//=mb_strimwidth($blog['blog'], 0, 150, "......");?></p> -->
                <p><?=$blog['short_dec'];?></p>
                <a href="blog-single.php?blog=<?=$blog['blog_uri']?>&bb=<?=$blog['id']?>" class="read-more">More Details <i class="fa fa-angle-right ml-2"></i></a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>

          <?php $db->links('blogs','deleted_at IS NULL') ?>
        		
        		<!-- <nav class="blog-pagination">
					<ul>
					  <li class="page-num active" ><a href="#">1</a></li>
					  <li class="page-num"><a href="#">2</a></li>
					  <li class="page-num"><a href="#">3</a></li>
					</ul>
				</nav> -->
      		</div>
      		

<?php
require_once 'include/frontend/right_side.php';
require_once 'include/frontend/footer.php';
?>
