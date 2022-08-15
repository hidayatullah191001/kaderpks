           <!-- Begin Page Content -->
           <div class="container-fluid">

             <!-- Page Heading -->
             <h4 class="font-weight-bold text-pks py-3 mb-0"><?= $title ?></h4>

             <div class="row">
               <div class="col-lg">

                <?= $this->session->flashdata('message') ?>
                <br>
                <div class="card shadow-lg">
                  <div class="card-header ">
                    <div class="row d-flex justify-content-between">
                      <div class="col text-pks font-weight-bold">
                      </div>
                      <div class="float-right">
                        <a href="<?=base_url('kantor/tambah_dpra/') ?>" type="button" class="btn btn-pks btn-sm">Tambah DPRa</a>  
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
                         <th scope="col">Nama DPC</th>
                         <th scope="col">Nama DPRa</th>
                         <th scope="col">No Telepon</th>
                         <th scope="col">Alamat</th>
                         <th scope="col">Action</th>
                       </tr>
                     </thead>
                     <tbody>
                      <?php $i = 1 ?>
                      <?php foreach ($dpra as $dpra) : ?>
                        <tr>
                          <td class="text-pks font-weight-bold"><?php echo $i++ ?></td>
                          <td class="text-pks"><?=$dpra['nama_dpc'] ?></td>
                          <td class="text-pks"><?=$dpra['nama_dpra'] ?></td>
                          <td class="text-pks"><?=$dpra['no_telp_dpra'] ?></td>
                          <td class="text-pks">
                            <?php
                            $kalimat = $dpra['alamat_dpra'];
                            $max = 40 ;
                            $cetak = substr($kalimat, 0, $max);
                            if (strlen($kalimat)>$max) {
                              echo $cetak.'...';
                            }else{
                              echo $cetak;
                            }?>
                          </td>
                          <td width="100">
                            <a href="<?= base_url('kantor/edit_dpra/').$dpra['id'] ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                            <a data-toggle="modal" data-target="#deleteDpraModal<?=$dpra['id']?>"  class="btn btn-danger btn-circle btn-sm"><i class="fas fa-fw fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php include "deleteDpra_modal.php" ?>
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
