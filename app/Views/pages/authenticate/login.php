<?= $this->extend("components/layout") ?>
<?= $this->section("konten-website") ?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text">
          <a href="#"><i class="fa fa-home"></i> Home</a>
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
          <form action="#">
            <div class="group-input">
              <label for="username">Username or email address *</label>
              <input type="text" id="username" />
            </div>
            <div class="group-input">
              <label for="pass">Password *</label>
              <input type="text" id="pass" />
            </div>
            <div class="group-input gi-check">
              <div class="gi-more">
                <label for="save-pass">
                  Save Password
                  <input type="checkbox" id="save-pass" />
                  <span class="checkmark"></span>
                </label>
                <a href="#" class="forget-pass">Forget your Password</a>
              </div>
            </div>
            <button type="submit" class="site-btn login-btn">Sign In</button>
          </form>
          <div class="switch-login">
            <a href="./register.html" class="or-login">Or Create An Account</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Login Form Section End -->
<?= $this->endSection() ?>