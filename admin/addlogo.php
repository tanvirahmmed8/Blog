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
                        aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h1 class="m-0">Logo</h1>
        </div>
        
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <?php
                    if (isset($_SESSION['update_success'])) {
                        $component->alert($_SESSION['update_success'],'success');
                    }
                    unset($_SESSION['update_success']);
                    ?>
                    
                    <form action="admin_logic/logo_post.php" method="post" enctype="multipart/form-data">
                        <?php $logos = $db->select('logos','*'); ?>
                        <?php foreach($logos as $logo): ?>
                        <div class="mb-3 row">
                            <img src="../uploads/logos/<?=$logo['logo_value']?>" alt="" width="100px">
                            <div class="col-12">
                                <label for="<?=$logo['logo_key']?>" class="form-label"><?=ucwords(str_replace("_"," ", $logo['logo_key']))?></label>
                                <input type="file" class="form-control" name="<?=$logo['logo_key']?>" id="<?=$logo['logo_key']?>" >
                                <small class="text-muted"><strong>NB:</strong> 144*34 image size require</small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <small class="text-muted mb-3"><strong>NB:</strong>Not require for feb icone</small>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
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