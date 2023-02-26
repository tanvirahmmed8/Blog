<div class="col-md-4">
              <div class="blog-sidebar mt-5 mt-lg-0 mt-md-0">
                  <div class="widget widget_search">
                      <h4 class="widget-title">Search</h4>
                      <form action="search.php" role="search" class="search-form">
                          <input type="text" name="search" class="form-control" placeholder="Search" value="<?=(isset($search))? $search:""?>">
                          <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                      </form>
                  </div>

                  <div class="widget widget_news">
                      <h4 class="widget-title">Latest Posts</h4>
                      <ul class="recent-posts">
                        <?php $latest_blogs = $db->select('blogs','*',null,'deleted_at IS NULL',"created_at DESC","3"); ?>
                        <?php foreach($latest_blogs as $latest_blog): ?>
                          <li>
                              <div class="widget-post-thumb">
                                  <a href="blog-single.php?blog=<?=$latest_blog['blog_uri']?>&bb=<?=$latest_blog['id']?>"><img src="uploads/blog_photos/<?=$latest_blog['image']?>" alt="" class="img-fluid"></a>
                              </div>
                              <div class="widget-post-body">
                              <?php $date=new DateTime($latest_blog['created_at']);?>
                                  <span><?=date_format($date,"M d, Y h:i:s A");?></span>
                                  <h6> <a href="blog-single.php?blog=<?=$latest_blog['blog_uri']?>&bb=<?=$latest_blog['id']?>"><?=$latest_blog['title']?></a></h6>
                              </div>
                          </li>
                          <?php endforeach; ?>
                        
                      </ul>
                  </div>


                  <div class="widget widget_categories">
                      <h4 class="widget-title">Categories</h4>
                      <?php 
                        $categoris = $db->select('categoris','*',null,'deleted_at IS NULL');
                      ?>
                      <ul>
                      <?php foreach($categoris as $cat): ?>
                        <?php $c_id = $cat['id']; $cat_coutn = $db->countRows("blogs", "cat_id=$c_id");?>
                        <li class="cat-item"><a href="blog_by_category.php?search=<?=$c_id?>"><i class="fa fa-angle-right"></i><?= $cat['name']; ?></a>(<?=$cat_coutn?>)</li>
                        <?php endforeach; ?>
                      </ul>
                  </div>
                  <?php
                    $tagsArray = [];
                    $stmt = $db->sql('SELECT distinct LOWER(tag) as tag FROM `blogs` where tag != "" group by tag');
                        foreach ($stmt as $key=>$value) {
                            $tagsArray[] = $value['tag'];
                        }
                        $tags = implode(", ", $tagsArray);
                        explode(',', $tags);
                    $finalTags = array_unique(explode(',', $tags));
                    // print_r($finalTags);
                    // foreach ($finalTags as $tag) {
                    //     echo  trim(ucwords($tag)," ");
                    // }
                ?>
                  <div class="widget widget_tag_cloud">
                      <h4 class="widget-title">Tags</h4>
                      <?php foreach($finalTags as $tag): ?>
                      <a href="taglinks.php?tag=<?=trim($tag," ");?>"><?=trim($tag," ");?></a>
                      <?php endforeach; ?>
                  </div>

              </div>
      		</div>
		</div>
	</div>
</div>


 