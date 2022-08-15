         <!-- Begin Page Content -->
         <div class="container-fluid">

         	<!-- Page Heading -->
         	<h1 class="h3 mb-4 text-pks font-weight-bold"><?=$title ?></h1>


         	<div class="row">
         		<div class="col-lg-8">

              <?= $this->session->flashdata('message') ?>
              <br>
         			<?= form_open_multipart('settings') ?>
         			<div class="card shadow-lg">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 text-pks col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control text-pks" id="email" name="email" value="<?= $user['email']?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 text-pks col-form-label">Full name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control text-pks" id="name" name="name" value="<?= $user['name']?>">
                      <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2 text-pks">Picture</div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-3">
                          <img src="<?= base_url('assets/images/profile/').$user['image'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                          <div class="custom-file">
                           <input type="file" class="tambah-file custom-file-input text-pks" name="image" id="image">
                           <label class="custom-file-label" for="file">Pilih gambar</label>
                           <small class="form-text text-danger"><?= form_error('file'); ?></small>
                         </div>
                         <button class="btn btn-pks mt-4" type="submit">Edit</button>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>  
             </div>
           </form>
         </div>	
       </div>


     </div>
     <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->

