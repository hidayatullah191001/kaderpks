

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
            <span class="fas fa-fw fa-plus"></span>&nbsp;&nbsp;Add new submenu
        </button>


        <br>
        <br>

        <div class="card">
            <div class="card-body">
                <table  id="tableuser" class="table table-hover ">
                   <thead class="bg-primary text-white">
                     <tr>
                       <th scope="col">#</th>
                       <th scope="col">Title</th>
                       <th scope="col">Menu</th>
                       <th scope="col">Url</th>
                       <th scope="col">Icon</th>
                       <th scope="col">Active</th>
                       <th scope="col">Action</th>
                   </tr>
               </thead>
               <tbody>
                <?php $i=1; ?>
                <?php foreach ($subMenu as $sm ) : ?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?=$sm['title']?></td>
                    <td><?=$sm['menu']?></td>
                    <td><?=$sm['url']?></td>
                    <td><?=$sm['icon']?></td>
                    <td><?=$sm['is_active']?></td>
                    <td>
                        <a class="btn icon-btn btn-outline-success"  data-toggle="modal" data-target="#editsubmenumodal<?=$sm['id'] ?>"><i class="oi oi-pencil"></i></a>
                        <a class="btn icon-btn btn-outline-danger" href="<?= base_url('menu/hapus_subMenu/').$sm['id']?>"><i class="oi oi-trash"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php include "editsubmenu_modal.php" ?>
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
            <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="<?=base_url('menu/submenu') ?>">
            <div class="modal-body">
             <div class="form-group">
               <input type="text"class="form-control" id="title" name="title" placeholder="Submenu title">
           </div>
           <div class="form-group">
            <select name="menu_id" id="menu_id" class="custom-select">
                <option value="">Select Menu</option>
                <?php foreach ($menu as $m):?>
                 <option value="<?=$m['id']?>"><?=$m['menu']?></option>
             <?php endforeach ?>
         </select>
     </div>
     <div class="form-group">
         <input type="text"class="form-control" id="url" name="url" placeholder="Submenu url">
     </div>
     <div class="form-group">
         <input type="text"class="form-control" id="icon" name="icon" placeholder="Submenu icon">
     </div>
     <div class="form-group">
         <div class="form-check">
           <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked="">
           <label class="form-check-label" for="is_active">
             Active?
         </label>
     </div>
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
