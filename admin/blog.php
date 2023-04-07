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

                        <form action="admin_logic/blog_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text"
                                    class="form-control" name="title" id="title" value="<?=(isset($_SESSION['old_title'])) ? $_SESSION['old_title']:"" ?>" placeholder="Blog Title">
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
                                    class="form-control" name="blog" placeholder="Blog Decsription"><?= (isset($_SESSION['old_blog'])) ? $_SESSION['old_blog']:""?></textarea>

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
                                    class="form-control" name="short_dec" placeholder="Short Decsription"><?= (isset($_SESSION['old_short_dec'])) ? $_SESSION['old_short_dec']:""?></textarea>

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
                                    <option disabled selected>Select one Category</option>
                                    <?php foreach($categoris as $c): ?>
                                        <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
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
                                    class="form-control" name="tag" value="<?=(isset($_SESSION['old_tag']))? $_SESSION['old_tag']:""?>" id="tag" placeholder="Add Tags">
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
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </form>
                        <?php 
                        unset($_SESSION['old_title']); 
                        unset($_SESSION['old_blog']); 
                        unset($_SESSION['old_short_dec']); 
                        unset($_SESSION['old_tag']); 
                        ?>
                    </div>
                </div>
            </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Blog List</h4>
                    <?php
                    if (isset($_SESSION['delete_success'])) {
                        $component->alert($_SESSION['delete_success'],'warning');
                    }
                    unset($_SESSION['delete_success']);

                    if (isset($_SESSION['delete_error'])) {
                        $component->alert($_SESSION['delete_error'],'danger');
                    }
                    unset($_SESSION['delete_error']);
                    ?>

                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Total View</th>
                                    <th>created at</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $perPage = 10; // Number of items per page
                            $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // Current page
                            $offset = ($page - 1) * $perPage; // Offset for pagination
                            $blogs = $db->select('blogs','*',null,'deleted_at IS NULL',"created_at DESC",$perPage,$offset);
                            ?>
                            <?php foreach($blogs as $blog): ?>
                                <tr>
                                    <td><?=$blog['id']?></td>
                                    <td><?=$blog['title']?></td>
                                    <?php $blog_id = $blog['id']; ?>
                                    <td><?=viewCount($db,"blog_id=$blog_id")?></td>
                                    <td><?=$blog['created_at']?></td>
                                    <td>
                                        <a href="blog_edit.php?blog=<?= $blog['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="admin_logic/blog_softdelete.php?blog=<?= $blog['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php $db->links('blogs','deleted_at IS NULL') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Trash List</h4>
                <?php
                    if (isset($_SESSION['restore_success'])) {
                        $component->alert($_SESSION['restore_success'],'warning');
                    }
                    unset($_SESSION['restore_success']);

                    if (isset($_SESSION['restore_error'])) {
                        $component->alert($_SESSION['restore_error'],'danger');
                    }
                    unset($_SESSION['restore_error']);
                    ?> 

                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>created at</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $perPage_trash = 10; // Number of items per page
                            $page_trash = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // Current page
                            $offset_trash = ($page_trash - 1) * $perPage_trash; // Offset for pagination
                            $blogs_trash = $db->select('blogs','*',null,'deleted_at IS NOT NULL',null,$perPage_trash,$offset_trash);
                            ?>
                            <?php foreach($blogs_trash as $blog): ?>
                                <tr>
                                    <td><?=$blog['id']?></td>
                                    <td><?=$blog['title']?></td>
                                    <td><?=$blog['created_at']?></td>
                                    <td>
                                        <a href="admin_logic/blog_restore.php?blog=<?= $blog['id']; ?>" class="btn btn-primary">Restore</a>
                                        <a href="admin_logic/blog_forcedelete.php?blog=<?= $blog['id']; ?>" class="btn btn-danger">Force Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php $db->links('blogs','deleted_at IS NOT NULL') ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
 require_once '../include/backend/footer.php'
?>