<style type="text/css">
  .nopadding {
    padding: 0 !important;
    margin: 0 !important;
  }
</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

<!-- [ Layout content ] Start -->
<div class="layout-content">

  <!-- [ content ] Start -->
  <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0"><?= $title ?></h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url('admin/manage') ?>">User Management</a></li>
        <li class="breadcrumb-item active"><a href="#"><?= $title ?></a></li>
      </ol>
    </div>

    <?php echo $this->session->flashdata('message') ?>

    <br>
    <br>

    <div class="card">
      <h6 class="card-header">Form Tambah User</h6>
      <div class="card-body">
        <form class="my-3" method="POST" action="<?= base_url('auth/sign_up') ?>">

          <div class="form-group">
            <label class="form-label">Full Name</label>
            <input placeholder="Full Name..." type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>">
            <?= form_error('name', '<small class="text-danger">', '</small>') ?>
            <div class="clearfix"></div>
          </div>

          <div class="form-group">
            <label class="form-label">Email</label>
            <input placeholder="Email..." type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            <div class="clearfix"></div>
          </div>

          <div class="form-group">
            <label class="form-label">Role</label>
            <select name="role_id" class="selectpicker" data-live-search="true">
              <?php foreach ($role as $rl) : ?>
                <option data-tokens="<?= $rl['role'] ?>" value="<?= $rl['id_role'] ?>"><?= $rl['role'] ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            <div class="clearfix"></div>
          </div>

      <div class="form-group">
        <label class="form-label">DPRa</label>
        <input placeholder="Insert DPRa..." type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
        <div class="clearfix"></div>
      </div>

      <div class="form-group">
        <label class="form-label">DPC</label>
        <input placeholder="Insert DPC..." type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
        <div class="clearfix"></div>
      </div>

      <div class="form-group">
        <label class="form-label d-flex justify-content-between align-items-end">
          <span>Password</span>
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
        <button type="submit" class="btn btn-primary">Register Account</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- [ content ] End -->