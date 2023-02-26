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
            <h1 class="m-0">Newsletter</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
   <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Newsletter</h4>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             $perPage = 10; // Number of items per page
                             $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1; // Current page
                             $offset = ($page - 1) * $perPage; // Offset for pagination
                            $newsletters = $db->select('newsletters','*',null,null,null,$perPage,$offset) ?>
                            <?php foreach($newsletters as $newsletter): ?>
                                <tr>
                                    <td><?=$newsletter['id']?></td>
                                    <td><?=$newsletter['email']?></td>
                                    <td>Action</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php $db->links('newsletters'); ?>
                
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