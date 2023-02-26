<?php
$title="Login/Register";
require_once 'include/frontend/header.php';
?>


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Login</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Login
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>



<main class="site-main page-wrapper woocommerce single single-product">
    <section class="space-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="woocommerce-notices-wrapper"></div>
                    <h2 class="font-weight-bold mb-4">Login</h2>
                    <form class="woocommerce-form woocommerce-form-login login" method="post">
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="username">Username or email address&nbsp;<span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="">
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password">
                        </p>
                        <p class="form-row">
                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="a414dce984"><input type="hidden" name="_wp_http_referer" value="/my-account/">
                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                            </label>
                        </p>
                        <p class="woocommerce-LostPassword lost_password">
                            <a href="#">Lost your password?</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2 class="font-weight-bold mb-4">Register</h2>
                    <form method="post" class="woocommerce-form woocommerce-form-register register">

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label>User Name&nbsp;<span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="user-name" id="" autocomplete="user-name" value="">
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label>Email address&nbsp;<span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="" autocomplete="email" value="">
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label>Password&nbsp;<span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="" autocomplete="password" value="">
                        </p>
                        <p class="woocommerce-FormRow form-row">
                            <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="b1c661ab82"><input type="hidden" name="_wp_http_referer" value="/my-account/">
                            <button type="submit" class="woocommerce-Button button" name="register" value="Register">Register</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>
  
<?php
require_once 'include/frontend/footer.php';
?>