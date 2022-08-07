<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <img src="<?= base_url('assets/images/logo.png') ?>" width="70" alt="">
                  <br>
                  <br>
                  <p class="mb-4">Kaderisasi Partai PKS</p>
                </div>

                <?php echo $this->session->flashdata('message') ?>
                <form class="user" method="POST" action="<?= base_url('auth') ?>">
                  <div class="form-group">
                  <label for="" class="text-pks font-weight-bold">Email</label>

                    <input type="text" class="form-control " id="email" name="email" placeholder="Email" name="email" value="<?php echo set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                  </div>

                  <div class="form-group">
                    <label for="" class="text-pks font-weight-bold">Password</label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control text-pks" placeholder="Konfirmasi password..." id="password1" name="password1">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-fw fa-eye" id="togglePassword1"></i></span>
                      </div>
                    </div>
                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>

                  </div>
                  <center>
                    <div class="col-lg-5">
                      <button type="submit" class="btn btn-pks btn-user btn-block">
                        Login
                      </button>
                    </div>
                  </center>
                  <br>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/sign_up') ?>">Create an Account!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>