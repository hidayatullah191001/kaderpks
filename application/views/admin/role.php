<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="font-weight-bold text-pks py-3 mb-0"><?=$title ?></h4>

    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message') ?>

            <a data-toggle="modal" data-target="#newRoleModal" class="btn btn-pks btn-icon-split mb-3">
                <span class="icon text-white-20">
                    <i class="fas fa-fw fa-plus"></i>
                </span>
                <span class="text">Add New Role</span></a>
                <br><br>
            <div class="card">
                <div class="card-body">
                <table class="table table-hover">
                <thead class="text-white bg-pks">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th class="text-pks" scope="row"><?= $i ?></th>
                            <td class="text-pks"><?= $r['role'] ?></td>
                            <td>
                                <a class="btn btn-warning btn-circle btn-sm" href="<?= base_url('admin/roleaccess/') . $r['id_role'] ?>"><i class="fas fa-fw fa-eye"></i></a>

                                <a class="btn btn-success btn-circle btn-sm" href="<?= base_url('/') . $r['id_role'] ?>"><i class="fas fa-fw fa-edit"></i></a>

                                <?php if ($r['id_role'] != 1) : ?>
                                    <a class="btn btn-danger btn-circle btn-sm" href="<?= base_url('admin/delete_role/') . $r['id_role'] ?>"><i class="fas fa-fw fa-trash"></i></a>
                                <?php endif ?>
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
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-pks" id="newMenuModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/role') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="text-pks">Role Name</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name...">
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