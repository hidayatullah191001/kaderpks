         <!-- Begin Page Content -->
         <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

           <div class="row">
             <div class="col-lg">

               <?php if (validation_errors()) : ?>
                 <div class="alert alert-danger text-danger">
                   <div class="icon text-white">
                     <i class="fas fa-fw fa-ban"></i>
                   </div>
                   <?= validation_errors() ?>
                 </div>
               <?php endif ?>

               <?= $this->session->flashdata('message') ?>

               <a data-toggle="modal" data-target="#newSubMenuModal" class="btn btn-primary btn-icon-split mb-3">
                 <span class="icon text-white-20">
                   <i class="fas fa-fw fa-plus"></i>
                 </span>
                 <span class="text">Add New Submenu</span>
               </a>

               <br>
               <br>
               <div class="card">
                <div class="card-body">
                <table id="datatable" class="table table-hover">
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
                   <?php $i = 1; ?>
                   <?php foreach ($subMenu as $sm) : ?>
                     <tr>
                       <th scope="row"><?= $i ?></th>
                       <td><?= $sm['title'] ?></td>
                       <td><?= $sm['menu'] ?></td>
                       <td><?= $sm['url'] ?></td>
                       <td><?= $sm['icon'] ?></td>
                       <td><?= $sm['is_active'] ?></td>
                       <td>
                         <a data-toggle="modal" data-target="#editsubmenumodal<?= $sm['id'] ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                         <a class="btn btn-danger btn-circle btn-sm" href="<?= base_url('menu/hapus_subMenu/') . $sm['id'] ?>"><i class="fas fa-fw fa-trash"></i></a>
                       </td>
                     </tr>
                     <?php $i++; ?>
                     <?php include "editsubmenu_modal.php"; ?>
                   <?php endforeach ?>
                 </tbody>
               </table>
                </div>
               </div>
               <br>
               <br>
             </div>
           </div>

         </div>
         <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->


         <!-- MODAL ADD -->

         <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form method="post" action="<?= base_url('menu/submenu') ?>">
                 <div class="modal-body">
                   <div class="form-group">
                     <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                   </div>
                   <div class="form-group">
                     <select name="menu_id" id="menu_id" class="form-control">
                       <option value="">Select Menu</option>
                       <?php foreach ($menu as $m) : ?>
                         <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                       <?php endforeach ?>
                     </select>
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
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

         <script type="text/javascript">
           $(document).ready(function() {
             $('#datatable').DataTable();
           });
         </script>