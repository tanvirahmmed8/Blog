<?php
 require_once '../include/backend/header.php'
 ?>

<?php if($role_check['role'] == 'admin'):?>

 <?php 
 if (isset($_GET['cat'])) {
    if($_GET['cat']){
        $id = $_GET['cat'];
    }else{
        $err = true;
     }
 }else{
    $err = true;
 }

 if (isset($id)) {
    // $db = new DB;
    $cat = $db->find('categoris',"$id","name,slug");
 }else{
    $err = true;
 }
 ?>

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Category Edit</li>
                </ol>
            </nav>
            <h1 class="m-0">Category Edit</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <?php if(!$err): ?>
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
                    <?php if($cat != null):?>
                    <form action="admin_logic/category_update.php?cat=<?=$id?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text"
                                class="form-control" name="name" id="name" placeholder="Category Name" value="<?= $cat['name'];?>">
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
                                class="form-control" name="slug" id="slug" aria-describedby="helpId" placeholder="Category Slug" value="<?= $cat['slug'];?>">
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
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    <?php endif;?>
                </div>
            </div>
        </div>
   </div>
   <?php else: ?>
   <?php $com = new Component; $com->error()?>
   <?php endif; ?>
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