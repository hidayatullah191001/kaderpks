<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="font-weight-bold text-pks py-3 mb-0"><?= $title ?></h4>

  <div class="row">
    <div class="col">
      
      <?= $this->session->flashdata('message') ?>

      <a data-toggle="modal" data-target="#newUserModal" class="btn btn-pks btn-icon-split mb-3">
        <span class="icon text-white-20">
          <i class="fas fa-fw fa-plus"></i>
        </span>
        <span class="text">Add New User</span></a>

      <br><br>
      <div class="card">
        <div class="card-body">
          <table id="datatable" class="table table-hover " cellspacing="0">
            <thead class="bg-pks text-white">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Gabung</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php foreach ($userr as $sm) : ?>
                <tr>
                  <td class="text-pks font-weight-bold"><?php echo $i++ ?></td>
                  <td class="text-pks">
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo date('d F Y', $sm['date_created']); ?>
                  </td>
                  <td class="text-pks" width="200"><?= $sm['name'] ?></td>
                  <td class="text-pks"><?= $sm['email'] ?></td>
                  <td class="text-pks">
                    <?php foreach ($role as $rl) : ?>

                      <?php if ($sm['role_id'] == $rl['id_role']) : ?>
                        <p><?= $rl['role'] ?></p>
                      <?php endif ?>

                    <?php endforeach ?>
                  </td>
                  <td class="text-pks"><?php if ($sm['is_active'] > 0) { ?>
                      <p>Active</p>
                    <?php } else { ?>
                      <p>Not Actived</p>
                    <?php } ?>
                  </td>
                  <td width="100">
                    <a href="<?= base_url('admin/edit/') . $sm['id'] ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-fw fa-edit"></i></a>

                    <?php if ($sm['role_id'] != 1) : ?>
                      <a class="btn btn-danger btn-circle btn-sm" href="<?= base_url('admin/delete_role/') . $rl['id_role'] ?>"><i class="fas fa-fw fa-trash"></i></a>
                    <?php endif ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-pks font-weight-bold" id="newMenuModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('admin/add_user') ?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="" class="text-pks font-weight-bold">Username</label>
            <input type="text" class="form-control text-pks" id="name" name="name" placeholder="Username...">
            <?= form_error('name', '<small class="text-danger">', '</small>') ?>
          </div>
          <div class="form-group">
            <label for="" class="text-pks font-weight-bold">Email</label>
            <input type="text" class="form-control text-pks" id="email" name="email" placeholder="Email...">
            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
          </div>
          <div class="form-group">
            <label for="" class="text-pks font-weight-bold">Role</label>
            <select name="role_id" class="form-control border selectpicker" data-live-search="true">
              <option value="0">Select Role</option>
              <?php foreach ($role as $rl) : ?>
                <option data-tokens="<?= $rl['role'] ?>" value="<?= $rl['id_role'] ?>"><?= $rl['role'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="text-pks font-weight-bold">DPRa</label>
            <select name="dpra_id" class="form-control border selectpicker" data-live-search="true">
              <option value="0">Select DPRa</option>
              <?php foreach ($dpra as $ra) : ?>
                <option data-tokens="<?= $ra['nama_dpra'] ?>" value="<?= $ra['id'] ?>"><?= $ra['nama_dpra'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="text-pks font-weight-bold">DPC</label>
            <select name="dpc_id" class="form-control border selectpicker" data-live-search="true">
              <option value="0">Select DPC</option>
              <?php foreach ($dpc as $pc) : ?>
                <option data-tokens="<?= $pc['nama_dpc'] ?>" value="<?= $pc['id'] ?>"><?= $pc['nama_dpc'] ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label for="" class="text-pks font-weight-bold">Password</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control text-pks" placeholder="Password..." id="password1" name="password1">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-fw fa-eye"  id="togglePassword1"></i></span>
              </div>
            </div>
            <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
          </div>

          <div class="form-group">
            <label for="" class="text-pks font-weight-bold">Konfirmasi Password</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control text-pks" placeholder="Konfirmasi password..." id="password2" name="password2">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-fw fa-eye" id="togglePassword2"></i></span>
              </div>
            </div>
            <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
            
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-pks">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>