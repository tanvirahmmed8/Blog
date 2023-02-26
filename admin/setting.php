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
                        aria-current="page">Setting</li>
                </ol>
            </nav>
            <h1 class="m-0">Setting</h1>
        </div>
        <div class="flatpickr-wrapper ml-3">
            <div id="recent_orders_date"
                    data-toggle="flatpickr"
                    data-flatpickr-wrap="true"
                    data-flatpickr-mode="range"
                    data-flatpickr-alt-format="d/m/Y"
                    data-flatpickr-date-format="d/m/Y">
                <a href="javascript:void(0)"
                    class="link-date"
                    data-toggle>13/03/2018 to 20/03/2018</a>
                <input class="flatpickr-hidden-input"
                        type="hidden"
                        value="13/03/2018 to 20/03/2018"
                        data-input>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
   <div class="roe">
    <div class="col-8 offset-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Settings Update</h4>
                <div class="container">
                <?php
                    if (isset($_SESSION['update_success'])) {
                        $component->alert($_SESSION['update_success'],'success');
                    }
                    unset($_SESSION['update_success']);
                    ?>
                    
                    <form action="admin_logic/setting_post.php" method="post">
                        <?php $settings = $db->select('settings','*'); ?>
                        <?php foreach($settings as $setting): ?>
                        <div class="mb-3 row">
                            <div class="col-12">
                                <label for="<?=$setting['setting_name']?>" class="form-label"><?=ucwords(str_replace("_"," ", $setting['setting_name']))?></label>
                                <input type="text" class="form-control" name="<?=$setting['setting_name']?>" id="<?=$setting['setting_name']?>" value="<?=$setting['setting_value']?>" placeholder="<?=ucwords(str_replace("_"," ", $setting['setting_name']))?>">
                            </div>
                        </div>
                        <?php endforeach; ?>
    
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