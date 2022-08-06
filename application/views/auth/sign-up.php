<div class="authentication-wrapper authentication-1 px-7">
  <div class="authentication-inner py-5">

    <!-- [ Logo ] Start -->
    <div class="d-flex justify-content-center align-items-center">
      <div class="ui-w-60">
        <div class="w-100 position-relative">
          <img src="<?=base_url('assets/images/')?>logo.png" alt="Brand Logo" class="img-fluid">
        </div>
      </div>
    </div>
    <!-- [ Logo ] End -->
    <div class="d-flex justify-content-center mt-4">
      <h3>Sign Up</h3>
    </div>
    <!-- [ Form ] Start -->
    <form class="my-3" method="POST" action="<?=base_url('auth/sign_up') ?>">
      <div class="form-group">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>">
        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
        <div class="clearfix"></div>
      </div>
      <div class="form-group">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
        <div class="clearfix"></div>
      </div>
      <div class="form-group">
        <label class="form-label d-flex justify-content-between align-items-end">
          <span>Password</span>
          <!-- <a href="pages_authentication_password-reset.html" class="d-block small">Forgot password?</a> -->
        </label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" autocomplete="current-password" name="password" id="id_password" aria-describedby="basic-addon2">
         
          <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="far fa-eye" id="togglePassword"></i></span>
          </div>
           <?= form_error('password', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </div>
    </form>
    <!-- [ Form ] End -->
    <div class="text-center text-muted">
      Already have an account yet?
      <a href="<?=base_url('auth') ?>">Sign In</a>
    </div>

  </div>
</div>
    <!-- [ content ] End