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
            <h1 class="m-0">Social Medias</h1>
        </div>
       
    </div>
</div>

<div class="container-fluid page__container">
   <div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Social Medias</h4>
                <?php
                    if (isset($_SESSION['success'])) {
                        $component->alert($_SESSION['success'],'success');
                    }
                    unset($_SESSION['success']);

                    if (isset($_SESSION['error'])) {
                        $component->alert($_SESSION['error'],'danger');
                    }
                    unset($_SESSION['error']);
                    ?>
                <form action="admin_logic/socialmedia_post.php" method="post">
                    <div class="mb-3">
                        <label for="socialmedia_icon" class="form-label">Social Media Icon</label>
                        <input type="text"
                        class="form-control" name="socialmedia_icon" id="socialmedia_icon" placeholder="Enter font awesome icon class">
                        <small id="socialmedia_iconHelpId" class="form-text text-muted">EX: fab fa-facebook-f</small>
                        <div class="form-text text-danger">
                            <?php
                            if (isset($_SESSION['icon_error'])) {
                                echo $_SESSION['icon_error'];
                            }
                            unset($_SESSION['icon_error']);
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="socialmedialink" class="form-label">Social Media URL</label>
                        <input type="text"
                        class="form-control" name="socialmedialink" id="socialmedialink" placeholder="Enter Your social medea link">
                        <div class="form-text text-danger">
                            <?php
                            if (isset($_SESSION['url_error'])) {
                                echo $_SESSION['url_error'];
                            }
                            unset($_SESSION['url_error']);
                            ?>
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
   <div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Social Medias List</h4>
                <?php
                    if (isset($_SESSION['delete_success'])) {
                        $component->alert($_SESSION['delete_success'],'success');
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
                                <th scope="col">Icon</th>
                                <th scope="col">Url</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $socials = $db->select('socialmedias'); ?>
                            <?php foreach($socials as $social): ?>
                                <tr>        
                                    <td><?=$social['id']?></td>
                                    <td><?=$social['socialmedia_icon']?></td>
                                    <td><?=$social['socialmedialink']?></td>
                                    <td>
                                        <!-- <a class="btn btn-secondary" href="admin_logic/socialmedia_edit.php?id=<?=$social['id']?>">Edit</a> -->
                                       

                                        <a class="btn btn-danger" href="admin_logic/socialmedia_delete.php?id=<?=$social['id']?>">Delete</a>
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