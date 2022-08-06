<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="font-weight-bold text-pks py-3 mb-0"><?= $title ?></h4>

  <div class="row">
    <div class="col">

      <?= form_error('menu', '<div class="alert alert-danger text-danger">
         				<div class = "icon text-white">
         				<i class="fas fa-fw fa-ban"></i>
         				</div>
         				', '
         				</div>') ?>

      <?= $this->session->flashdata('message') ?>

      <a data-toggle="modal" data-target="#newUserModal" class="btn btn-pks btn-icon-split mb-3">
        <span class="icon text-white-20">
          <i class="fas fa-fw fa-plus"></i>
        </span>
        <span class="text">Add New User</span></a>

      <br><br>
      <div class="card">
        <h6 class="card-header orangePks">All Data User</h6>
        <div class="card-body">
          <table id="datatable" class="table table-hover ">
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
                  <td><?php echo $i++ ?></td>
                  <td>
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo date('d F Y', $sm['date_created']); ?>
                  </td>
                  <td width="200"><?= $sm['name'] ?></td>
                  <td><?= $sm['email'] ?></td>
                  <td>
                    <?php foreach ($role as $rl) : ?>

                      <?php if ($sm['role_id'] == $rl['id_role']) : ?>
                        <p><?= $rl['role'] ?></p>
                      <?php endif ?>

                    <?php endforeach ?>
                  </td>
                  <td><?php if ($sm['is_active'] > 0) { ?>
                      <p>Active</p>
                    <?php } else { ?>
                      <p>Not Actived</p>
                    <?php } ?>
                  </td>
                  <td width="100">
                    <a href="<?= base_url('admin/edit/') . $sm['id'] ?>" class="btn icon-btn btn-outline-success"><i class="oi oi-pencil"></i></a>

                    <?php if ($sm['role_id'] != 1) : ?>
                      <a class="btn icon-btn btn-outline-danger" href="<?= base_url('admin/delete_role/') . $rl['id_role'] ?>"><i class="oi oi-trash"></i></a>
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
        <h5 class="modal-title" id="newMenuModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('menu') ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="User name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Password">
          </div>
          <div class="form-group">
          <select name="menu_id" class="form-control selectpicker" data-live-search="true">
            <option value="">Select Role</option>
            <?php foreach ($role as $rl) : ?>
              <option data-tokens="<?=$rl['role'] ?>" value="<?= $rl['id_role'] ?>"><?= $rl['role'] ?></option>
            <?php endforeach ?>
          </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="DPRa">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="DPC">
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