<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="font-weight-bold text-pks py-3 mb-0"><?=$title ?></h4>

    <div class="row">
        <div class="col-lg-6">

            <?= form_error('menu', '<div class="alert alert-danger text-danger">
         				<div class = "icon text-white">
         				<i class="fas fa-fw fa-ban"></i>
         				</div>
         				', '
         				</div>') ?>

            <?= $this->session->flashdata('message') ?>

            <a data-toggle="modal" data-target="#newMenuModal" class="btn btn-pks btn-icon-split mb-3">
                <span class="icon text-white-20">
                    <i class="fas fa-fw fa-plus"></i>
                </span>
                <span class="text">Add New Menu</span></a>

                <br><br>
            <div class="card">
                <div class="card-body">
                <table class="table table-hover">
                        <thead class="bg-pks text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <th class="text-pks"scope="row"><?= $i ?></th>
                                    <td class="text-pks"><?= $m['menu'] ?></td>
                                    <td>
                                        <a class="btn btn-circle btn-sm btn-success" href="<?= base_url('menu/edit_menu/') . $m['id'] ?>"><i class="fas fa-fw fa-edit"></i></a>

                                        <a class="btn btn-circle btn-sm btn-danger" href="<?= base_url('menu/hapus_menu/') . $m['id'] ?>"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-pks font-weight-bold" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('menu') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control text-pks" id="menu" name="menu" placeholder="Menu name">
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