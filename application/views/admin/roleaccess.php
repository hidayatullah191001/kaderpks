<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="font-weight-bold text-pks py-3 mb-0"><?= $title ?></h4>

  <div class="row">
    <div class="col-lg-6">

      <?= form_error('menu', '<div class="alert alert-danger text-danger">
         				<div class = "icon text-white">
         				<i class="fas fa-fw fa-ban"></i>
         				</div>
         				', '
         				</div>') ?>

      <?= $this->session->flashdata('message') ?>
      <br>
      <h6 class="text-pks font-weight-bold">Edit Role Access : <?= $role['role'] ?></h6>

      <br>
      <div class="card">
        <div class="card-header">
          <a style="text-decoration: none;" href="<?= base_url('admin/role') ?>" class="orangePks font-weigth-bold">
            <i class="fas fa-fw fa-arrow-left"></i>
            &nbsp;&nbsp;
            <b>Kembali</b>
          </a>
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead class="bg-pks text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">Access</th>
              </tr>
            </thead>
            <tbody class="text-pks">
              <?php $i = 1; ?>
              <?php foreach ($menu as $m) : ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $m['menu'] ?></td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" <?= check_access($role['id_role'], $m['id']) ?> data-role="<?= $role['id_role'] ?>" data-menu="<?= $m['id'] ?>">
                    </div>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('menu') ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>