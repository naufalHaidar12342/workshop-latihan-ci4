<?= $this->extend("components/Layout") ?>
<?= $this->section("konten-website") ?>
<?php
$username = [
  "name" => "username",
  "id" => "username",
  "value" => null,
];

$password = [
  "name" => "password",
  "id" => "password",
];

$session = session();
$errors = $session->getFlashdata("errors");
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text">
          <a href="<?= site_url("/"); ?>"><i class="fa fa-home"></i> Home</a>
          <span>Login</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Login Section Begin -->
<div class="register-login-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="login-form">
          <h2>Login</h2>
          <?php if ($errors != null) : ?>
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Terjadi kesalahan</h4>
              <hr>
              <p class="mb-0">
                <?php foreach ($errors as $err) {
                  echo $err . "<br>";
                } ?>
              </p>
            </div>
          <?php endif ?>
          <form action="<?= site_url("login"); ?>" method="POST">
            <div class="group-input">
              <label for="username">Username *</label>
              <input type="text" id="username" name="username" />
            </div>
            <div class="group-input">
              <label for="pass">Password *</label>
              <input type="password" id="pass" name="password" />
            </div>
            <div class="group-input">
              <label for="confirm-password">Confirm Password *</label>
              <input type="password" id="repeat-pass" name="repeatPassword" />
            </div>
            <button type="submit" class="site-btn login-btn" value="Sign In">Sign In</button>
          </form>
          <div class="switch-login">
            <a href="<?= site_url("register"); ?>" class="or-login">Or Create An Account</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Login Form Section End -->
<?= $this->endSection() ?>