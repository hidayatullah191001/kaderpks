         <!-- Begin Page Content -->
         <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

           <div class="row">
             <div class="col-lg">

              <?= $this->session->flashdata('message') ?>

               <a data-toggle="modal" data-target="#newSubMenuModal" class="btn btn-pks btn-icon-split mb-3">
                 <span class="icon text-white-20">
                   <i class="fas fa-fw fa-plus"></i>
                 </span>
                 <span class="text">Add New Submenu</span>
               </a>

               <br>
               <br>
               <div class="card">
                 <div class="card-body">
                   <table id="tableuser" width="100%" class="table table-striped" cellspacing="0">
                     <thead class="bg-pks text-white">
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
                     <tbody class="text-pks">
                       <?php $i = 1; ?>
                       <?php foreach ($subMenu as $sm) : ?>
                         <tr>
                           <th scope="row"><?= $i ?></th>
                           <td><?= $sm['title'] ?></td>
                           <td><?= $sm['menu'] ?></td>
                           <td><?= $sm['url'] ?></td>
                           <td><i class="<?= $sm['icon']?>"></i></td>
                           <td class="text-pks"><?php if ($sm['is_active'] > 0) { ?>
                               <p>Active</p>
                             <?php } else { ?>
                               <p>Not Actived</p>
                             <?php } ?>
                           </td>
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
                 <h5 class="modal-title text-pks font-weight-bold" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <form method="post" action="<?= base_url('menu/submenu') ?>">
                 <div class="modal-body">
                   <div class="form-group">
                     <input type="text" class="form-control text-pks" id="title" name="title" placeholder="Submenu title">
                   </div>
                   <div class="form-group">
                     <select name="menu_id" id="menu_id" class="form-control text-pks">
                       <option value="">Select Menu</option>
                       <?php foreach ($menu as $m) : ?>
                         <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                       <?php endforeach ?>
                     </select>
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control text-pks" id="url" name="url" placeholder="Submenu url">
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control text-pks " id="icon" name="icon" placeholder="Submenu icon">
                   </div>
                   <div class="form-group">
                     <div class="form-check">
                       <input class="form-check-input text-pks" type="checkbox" value="1" name="is_active" id="is_active" checked="">
                       <label class="form-check-label" for="is_active">
                         Active?
                       </label>
                     </div>
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

         <script type="text/javascript">
           $(document).ready(function() {
             $('#datatable').DataTable();
           });
         </script>