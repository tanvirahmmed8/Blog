<?php
 require_once '../include/backend/header.php'
?>
<?php if($role_check['role'] == 'admin'):?>

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Category</li>
                </ol>
            </nav>
            <h1 class="m-0">Category</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    
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
                    <form action="admin_logic/category_post.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text"
                                class="form-control" name="name" id="name" placeholder="Category Name">
                            <div class="form-text text-danger">
                                <?php
                                if (isset($_SESSION['name_error'])) {
                                    echo $_SESSION['name_error'];
                                }
                                ?>
                                <?php unset($_SESSION['name_error']); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text"
                                class="form-control" name="slug" id="slug" aria-describedby="helpId" placeholder="Category Slug">
                                <div class="form-text text-danger">
                                <?php
                                if (isset($_SESSION['slug_error'])) {
                                    echo $_SESSION['slug_error'];
                                }
                                ?>
                                <?php unset($_SESSION['slug_error']); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>
   <div class="row-">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category List</h4>
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
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">sluh</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $categoris = $db->select('categoris','*',null,'deleted_at IS NULL');
                            ?>
                            <?php foreach($categoris as $cat): ?>
                                <tr>
                                    <td><?= $cat['id']; ?></td>
                                    <td><?= $cat['name']; ?></td>
                                    <td><?= $cat['slug']; ?></td>
                                    <?php $date=new DateTime($cat['created_at']); ?>
                                    <td><?= date_format($date,"d-M-Y h:i:s A"); ?></td>
                                    <td>
                                        <a href="category_edit.php?cat=<?= $cat['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="admin_logic/category_delete.php/?cat=<?= $cat['id']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
   </div>

   <div class="row-">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Trash List</h4>
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
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">sluh</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $deleted_categoris = $db->select('categoris','*',null,'deleted_at IS NOT NULL');
                            ?>
                            <?php foreach($deleted_categoris as $cat): ?>
                                <tr>
                                    <td><?= $cat['id']; ?></td>
                                    <td><?= $cat['name']; ?></td>
                                    <td><?= $cat['slug']; ?></td>
                                    <?php $date=new DateTime($cat['created_at']); ?>
                                    <td><?= date_format($date,"d-M-Y h:i:s A"); ?></td>
                                    <td>
                                        <a href="admin_logic/category_restore.php/?cat=<?= $cat['id']; ?>" class="btn btn-primary">Restore</a>
                                        <a href="admin_logic/category_force_delete.php?cat=<?= $cat['id']; ?>" class="btn btn-danger">Force Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
   </div>
</div>

<?php else:?>
    <div class="container-fluid page__container">
        <div class="d-flex align-items-center justify-content-center" style="height: 90vh;">
            <h2>Only For Admin!</h2>
        </div>
</div>
<?php endif;?>
<?php
 require_once '../include/backend/footer.php'
?>