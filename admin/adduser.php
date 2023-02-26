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
            <h1 class="m-0">Add User</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
   <div class="row">
    <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <?php
                if (isset($_SESSION['register_success'])) {
                    $component->alert($_SESSION['register_success'],'success');
                }
                unset($_SESSION['register_success']);

                if (isset($_SESSION['register_error'])) {
                    $component->alert($_SESSION['register_error'],'danger');
                }
                unset($_SESSION['register_error']);
            ?>
                <form action="admin_logic/adduser_post.php"
                    method="POST"
                    novalidate>
                    <div class="form-group">
                        <label class="text-label"
                            for="name_2">Name:</label>
                        <div class="input-group input-group-merge">
                            <input id="name_2"
                                type="text"
                                required=""
                                name="name"
                                class="form-control form-control-prepended"
                                value="<?= (isset($_SESSION['old_name'])) ? $_SESSION['old_name']: ""?>"
                                placeholder="John Doe">
                                
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-user"></span>
                                </div>
                            </div>
                            
                        </div>
                        <div id="emailHelp" class="form-text text-danger">
                                <?php
                                if (isset($_SESSION['name_error'])) {
                                    echo $_SESSION['name_error'];
                                }
                                ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-label"
                            for="email_2">Email Address:</label>
                        <div class="input-group input-group-merge">
                            <input id="email_2"
                                type="email"
                                required=""
                                name="email"
                                class="form-control form-control-prepended"
                                value="<?= (isset($_SESSION['old_email'])) ? $_SESSION['old_email']: ""?>"
                                placeholder="john@doe.com">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div id="emailHelp" class="form-text text-danger">
                                <?php
                                if (isset($_SESSION['email_error'])) {
                                    echo $_SESSION['email_error'];
                                }
                                ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-label"
                            for="email_2">User Role:</label>
                        <div class="input-group input-group-merge">
                            <select name="role" class="form-control form-control-prepended">
                                <option selected value="creator">Creator</option>
                                <option value="admin">Admin</option>
                            </select>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div id="emailHelp" class="form-text text-danger">
                                <?php
                                if (isset($_SESSION['email_error'])) {
                                    echo $_SESSION['email_error'];
                                }
                                ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-label"
                            for="password_2">Password:</label>
                        <div class="input-group input-group-merge">
                            <input id="password_2"
                                type="password"
                                required=""
                                name="password"
                                class="form-control form-control-prepended"
                                placeholder="Enter your password">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <div id="emailHelp" class="form-text text-danger" style="max-width: 300px;">
                                <?php
                                if (isset($_SESSION['password_error'])) {
                                    echo $_SESSION['password_error'];
                                }
                                ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-label"
                            for="password_2">Confirm Password:</label>
                        <div class="input-group input-group-merge">
                            <input id="password_2"
                                type="password"
                                required=""
                                name="cpassword"
                                class="form-control form-control-prepended"
                                placeholder="Enter your Confirm password">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <div id="emailHelp" class="form-text text-danger">
                                <?php
                                if (isset($_SESSION['cpassword_error'])) {
                                    echo $_SESSION['cpassword_error'];
                                }
                                ?>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                                checked=""
                                name="terms"
                                class="custom-control-input"
                                id="terms" />
                            <label class="custom-control-label"
                                for="terms">I accept <a href="#">Terms and Conditions</a></label>
                        </div>
                        <div id="emailHelp" class="form-text text-danger">
                                <?php
                                if (isset($_SESSION['terms_error'])) {
                                    echo $_SESSION['terms_error'];
                                }
                                ?>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary mb-2"
                                type="submit">Create User</button><br>
                    </div>
                </form>
                <?php
                unset($_SESSION['terms_error']);
                unset($_SESSION['old_name']);
                unset($_SESSION['name_error']);
                unset($_SESSION['old_email']);
                unset($_SESSION['email_error']);
                unset($_SESSION['password_error']);
                unset($_SESSION['cpassword_error']);
                ?>
            </div>
        </div>
    </div>
   </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin/Creator List</h4>
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $userslist = $db->select('users',"*",null,"role <> 'user'") ?>
                                <?php foreach($userslist as $u): ?>
                                <tr>
                                    <td><?=$u['id']?></td>
                                    <td><?=$u['name']?></td>
                                    <td><?=$u['email']?></td>
                                    <td><?=$u['role']?></td>
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