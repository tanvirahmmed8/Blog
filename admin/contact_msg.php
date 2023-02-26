<?php
 require_once '../include/backend/header.php'
?>
<?php if($role_check['role'] == 'admin' || $role_check['role'] == 'creator'):?>

<div class="app-chat-container">
    <div class="row h-100 m-0">
        <div class="col-lg-4 py-3 px-0 d-none d-lg-flex flex-column h-100">
            <div id="delete_msg"></div>
            <div class="search-form form-control-rounded search-form--light mx-3">
                <input type="text"
                    class="form-control"
                    placeholder="What are you looking for?"
                    id="searchSample02">
                <button class="btn"
                        type="button"><i class="material-icons">search</i></button>
            </div>
            <div class="pt-3 mx-3"> 
                <button class="btn refresmsgbtn" onclick="RefreshMsg()" type="button">
                    <i class="material-icons refresmsg">refresh</i>
                </button>
            </div>
            <div class="flex pt-3"
                data-perfect-scrollbar>
                <div class="list-group contact-msg-load list-group-flush"
                    style="position: relative; z-index: 0;">
                    
                </div>
            </div>

            <div class="border-top pt-3 px-3 text-center">
                <!-- <a href=""
                class="btn btn-primary">Create Message</a> -->
            </div>

        </div>
        <div class="col-lg-8 full-con-body py-3 px-4 bg-white border-left d-flex flex-column h-100">
            
            <div class="border-top pt-3 px-3 text-center">
                <!-- Click here to <a class="btn btn-link px-0"
                href="">Reply</a> or <a class="btn btn-link px-0"
                href="">Forward</a> this message. -->
            </div>
        </div>
    </div>
</div>
            
<?php else:?>
    <div class="container-fluid page__container">
        <div class="d-flex align-items-center justify-content-center" style="height: 90vh;">
            <h2>Only For Admin and Creator!</h2>
        </div>
</div>
<?php endif;?>
<?php
 require_once '../include/backend/footer.php'
?>