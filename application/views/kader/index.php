         <!-- Begin Page Content -->
         <div class="container-fluid">

           <!-- Page Heading -->
           <h4 class="font-weight-bold text-pks py-3 mb-0"><?= $title ?></h4>

           <div class="row">
             <div class="col-lg">

              <?= $this->session->flashdata('message') ?>
              <br>
              <div class="card shadow-lg my-5">
                <div class="card-header ">
                  <div class="row d-flex justify-content-between">
                    <div class="col text-pks font-weight-bold">
                      Data Kader
                    </div>
                    <div class="float-right">
                      <a href="<?=base_url('kader/tambah_kader/') ?>" type="button" class="btn btn-pks btn-sm">Tambah Kader</a>  
                      <a href="" type="button" class="btn btn-danger btn-sm"><i class="far fa-file-pdf mr-2"></i>Pdf</a>  
                      <a href="" type="button" class="btn btn-success btn-sm"><i class="far fa-file-excel mr-2"></i>Excel</a>  
                    </div>
                  </div>
                </div>
                <div class="card-body">
                 <table id="tableuser" width="100%" class="table table-striped" cellspacing="0">
                   <thead class="bg-pks text-white">
                     <tr>
                       <th scope="col">No</th>
                       <th scope="col">DPC</th>
                       <th scope="col">DPRa</th>
                       <th scope="col">No Anggota</th>
                       <th scope="col">Nama Kader</th>
                       <th scope="col">No Hp Kader</th>
                       <th scope="col">Email Kader</th>
                       <th scope="col">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($kader as $kdr) : ?>
                      <tr>
                        <td class="text-pks font-weight-bold"><?php echo $i++ ?></td>
                        <td class="text-pks"><?=$kdr['nama_dpc'] ?></td>
                        <td class="text-pks"><?=$kdr['nama_dpra'] ?></td>
                        <td class="text-pks"><?=$kdr['no_anggota'] ?></td>
                        <td class="text-pks"><?=$kdr['nama'] ?></td>
                        <td class="text-pks"><?=$kdr['no_hp'] ?></td>
                        <td class="text-pks"><?=$kdr['email'] ?></td>
                        <td width="100">
                          <a href="<?= base_url('kader/edit_kader/') . $kdr['id'] ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                          <a data-toggle="modal" data-target="#deleteKaderModal<?=$kdr['id']?>"  class="btn btn-danger btn-circle btn-sm"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php include "deleteKader_modal.php" ?>
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
