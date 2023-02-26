<?php
 require_once '../include/backend/header.php'
?>
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Blog</li>
                </ol>
            </nav>
            <h1 class="m-0">Blog</h1>
        </div>
    </div>
</div>
<?php
$id=$_GET['blog'];
$blog = $db->find('blogs',$id);
?>
<div class="container-fluid page__container">
    <div class="row">
            <div class="offset-2 col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Blog</h4>
                        
                        <?php
                        if (isset($_SESSION['insert_success'])) {
                            $component->alert($_SESSION['insert_success'],'success');
                        }
                        ?>
                        <?php unset($_SESSION['insert_success']); ?>

                        <?php
                        if (isset($_SESSION['insert_error'])) {
                            $component->alert($_SESSION['insert_error'],'danger');
                        }
                        ?>
                        <?php unset($_SESSION['insert_error']); ?>

                        <form action="admin_logic/blog_update.php?blog=<?=$blog['id']?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text"
                                    class="form-control" name="title" id="title" value="<?=$blog['title']?>" placeholder="Blog Title">
                                <div class="form-text text-danger">
                                    <?php
                                    if (isset($_SESSION['title_error'])) {
                                        echo $_SESSION['title_error'];
                                    }
                                    ?>
                                    <?php unset($_SESSION['title_error']); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="blog" class="form-label">Blog Decsription</label>
                                <textarea id="summernote" type="text"
                                    class="form-control" name="blog" placeholder="Blog Decsription"><?=$blog['blog']?></textarea>

                                    <div class="form-text text-danger">
                                    <?php
                                    if (isset($_SESSION['blog_error'])) {
                                        echo $_SESSION['blog_error'];
                                    }
                                    ?>
                                    <?php unset($_SESSION['blog_error']); ?>
                                </div>
                                <div><strong>NB:</strong> If you want to remove the table border? <br> Then remove the "table-bordered" class and set this style to the top!<br>
                                    <input type="text" height="50px" readonly value="<style>.table th, .table td { border-top: 0 !important; } </style>" style="height: 68px; width: 100%; border: 0; background-color: #ccc6c6; line-height: 60px; outline:none;">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="short_dec" class="form-label">Short Decsription</label>
                                <textarea id="short_dec" type="text"
                                    class="form-control" name="short_dec" placeholder="Short Decsription"><?=$blog['short_dec']?></textarea>

                                    <div class="form-text text-danger">
                                    <?php
                                    if (isset($_SESSION['short_dec_error'])) {
                                        echo $_SESSION['short_dec_error'];
                                    }
                                    ?>
                                    <?php unset($_SESSION['short_dec_error']); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <img src="../uploads/blog_photos/<?=$blog['image']?>" width="100px" alt="">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                <div class="form-text text-danger">
                                    <?php
                                    if (isset($_SESSION['image_error'])) {
                                        echo $_SESSION['image_error'];
                                    }
                                    ?>
                                    <?php unset($_SESSION['image_error']); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cat_id" class="form-label">Category</label>
                                <?php $categoris = $db->select('categoris','id,name'); ?>
                                <select name="cat_id" class="form-control">
                                    <option disabled >Select one Category</option>
                                    <?php foreach($categoris as $c): ?>
                                        <option <?=($blog['cat_id'] == $c['id'])?'selected':'' ?> value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-text text-danger">
                                    <?php
                                    if (isset($_SESSION['cat_id_error'])) {
                                        echo $_SESSION['cat_id_error'];
                                    }
                                    ?>
                                    <?php unset($_SESSION['cat_id_error']); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label">Tag (Separated by comma without space)</label>
                                <input type="text"
                                    class="form-control" name="tag" id="tag" value="<?=$blog['tag']?>" placeholder="Add Tags">
                                <div class="form-text text-danger">
                                    <?php
                                    if (isset($_SESSION['tag_error'])) {
                                        echo $_SESSION['tag_error'];
                                    }
                                    ?>
                                    <?php unset($_SESSION['tag_error']); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>



<?php
 require_once '../include/backend/footer.php'
?>