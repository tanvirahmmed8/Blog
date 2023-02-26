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
            <h1 class="m-0">About Us Page</h1>
        </div>
    </div>
</div>

<?php $about = $db->select('about_us','about_us,id'); ?>

<div class="container-fluid page__container">
   <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <?php
                        if (isset($_SESSION['update_success'])) {
                            $component->alert($_SESSION['update_success'],'success');
                        }
                        ?>
                        <?php unset($_SESSION['update_success']); ?>

                        <?php
                        if (isset($_SESSION['update_error'])) {
                            $component->alert($_SESSION['update_error'],'danger');
                        }
                        ?>
                        <?php unset($_SESSION['update_error']); ?>

                <form action="admin_logic/about_us_update.php" method="post">
                    <div class="mb-3">
                      <label for="about_us" class="form-label">Description</label>
                      <textarea class="form-control" name="about_us" id="summernote"> <?=$about[0]['about_us'];?> </textarea>
                      <div><strong>NB:</strong> If you want to remove the table border? <br> Then remove the "table-bordered" class and set this style to the top!<br>
                                    <input type="text" height="50px" readonly value="<style>.table th, .table td { border-top: 0 !important; } </style>" style="height: 68px; width: 100%; border: 0; background-color: #ccc6c6; line-height: 60px; outline:none;">
                                </div>
                    </div>
                    <input type="text" name="id" hidden value="<?=$about[0]['id'];?>" />
                    <div class="mb-3">
                     <button type="submit" class="btn btn-primary">Update</button>
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