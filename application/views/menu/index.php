

<style type="text/css">
    .nopadding {
     padding: 0 !important;
     margin: 0 !important;
 }
</style>
<!-- [ Layout content ] Start -->
<div class="layout-content">

    <!-- [ content ] Start -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0"><?=$title ?></h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item active"><a href="#"><?=$title ?></a></li>
            </ol>
        </div>

        <?php echo $this->session->flashdata('message') ?>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <span class="fas fa-fw fa-plus"></span>&nbsp;&nbsp;Add new menu
        </button>


        <br>
        <br>

        <div class="col-sm-6 nopadding">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach ($menu as $m ) : ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?=$m['menu']?></td>
                                    <td>
                                        <a class="btn icon-btn btn-outline-success" href="<?= base_url('menu/edit_menu/').$m['id'] ?>"><i class="oi oi-pencil"></i></a>

                                        <a class="btn icon-btn btn-outline-danger" href="<?= base_url('menu/hapus_menu/').$m['id']?>"><i class="oi oi-trash"></i></a>
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
<!-- [ content ] End -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="<?=base_url('menu') ?>">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text"class="form-control" id="menu" name="menu" placeholder="Menu name">
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

