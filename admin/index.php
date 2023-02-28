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
                        aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h1 class="m-0">Dashboard</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
        <div class="col-3">
            <div class="card card-body text-center">
                <div class="mb-1"><i class="material-icons icon-muted icon-40pt">assessment</i></div>
                <div class="text-amount"><?=viewCount($db)?> </div>
                <div class="card-header__title mb-2">Total Visits</div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-body text-center">
                <div class="mb-1"><i class="material-icons icon-muted icon-40pt">assessment</i></div>
                <div class="text-amount"><?=viewCount($db,"referring_url LIKE '%facebook%'")?> </div>
                <div class="card-header__title mb-2">Visitors from Fb</div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-body text-center">
                <div class="mb-1"><i class="material-icons icon-muted icon-40pt">assessment</i></div>
                <div class="text-amount"><?=viewCount($db,"referring_url LIKE '%twitter%'")?> </div>
                <div class="card-header__title mb-2">Visitors from Tw</div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-body text-center">
                <div class="mb-1"><i class="material-icons icon-muted icon-40pt">assessment</i></div>
                <div class="text-amount"><?=viewCount($db, "referring_url NOT LIKE '%twitter%' OR referring_url NOT LIKE '%facebook%'")?> </div>
                <div class="card-header__title mb-2">Visitors from others</div>
            </div>
        </div>
   </div>
</div>

<?php
 require_once '../include/backend/footer.php'
?>