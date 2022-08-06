

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
    <a href="<?=base_url('admin/add_user') ?>" class="btn btn-primary">
      <span class="fas fa-fw fa-plus"></span>&nbsp;&nbsp;Add new user
    </a>


    <br>
    <br>

    <div class="card">
      <div class="card-body">
        <table  id="tableuser" class="table table-hover ">
         <thead class="bg-primary text-white">
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
          <?php foreach ($userr as $sm):?>
            <tr>
             <td><?php echo $i++ ?></td>
             <td> 
              <?php 
              date_default_timezone_set('Asia/Jakarta');
              echo date('d F Y', $sm['date_created']); ?>
            </td>
            <td width="200"><?= $sm['name']?></td>
            <td><?= $sm['email']?></td>
            <td>
              <?php foreach ($role as $rl) : ?>

                <?php if ($sm['role_id'] == $rl['id_role']): ?>
                  <p><?= $rl['role'] ?></p>
                <?php endif ?>

              <?php endforeach ?>
            </td>
            <td><?php  if($sm['is_active'] > 0) {?>
             <p>Active</p>
           <?php } else { ?>
             <p>Not Actived</p>
           <?php } ?>
         </td>
         <td width="100">
           <a href="<?=base_url('admin/edit/').$sm['id'] ?>" class="btn icon-btn btn-outline-success"><i class="oi oi-pencil"></i></a>
           
           <?php if ($sm['role_id'] != 1 ) : ?>
            <a class="btn icon-btn btn-outline-danger" href="<?= base_url('admin/delete_role/').$rl['id_role']?>"><i class="oi oi-trash"></i></a>
          <?php endif ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
</div>
</div>
<!-- [ content ] End -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('menu') ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text"class="form-control" id="menu" name="menu" placeholder="User name">
          </div>
          <div class="form-group">
            <input type="text"class="form-control" id="menu" name="menu" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text"class="form-control" id="menu" name="menu" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="text"class="form-control" id="menu" name="menu" placeholder="DPRa">
          </div>
          <div class="form-group">
            <input type="text"class="form-control" id="menu" name="menu" placeholder="DPC">
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

