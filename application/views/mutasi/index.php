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
                      Data Mutasi Kader
                    </div>
                    <?php if ($user['role_id'] == 4): ?>
                      <div class="float-right">
                        <a href="<?=base_url('mutasi/buat_mutasi/') ?>" type="button" class="btn btn-pks btn-sm">Buat mutasi</a>  
                        <a href="" type="button" class="btn btn-danger btn-sm"><i class="far fa-file-pdf mr-2"></i>Pdf</a>  
                        <a href="" type="button" class="btn btn-success btn-sm"><i class="far fa-file-excel mr-2"></i>Excel</a>  
                      </div>
                    <?php endif ?>
                  </div>
                </div>
                <div class="card-body">
                 <table id="tableuser" width="100%" class="table table-striped" cellspacing="0">
                   <thead class="bg-pks text-white">
                     <tr>
                       <th scope="col">No</th>
                       <th scope="col">Nama Kader</th>
                       <th scope="col">Jenis Mutasi</th>
                       <th scope="col">DPC Tujuan</th>
                       <th scope="col">DPRa Tujuan</th>
                       <th scope="col">File Pendukung</th>
                       <th scope="col">Status</th>
                       <?php if ($user['role_id'] == 4): ?>
                         <th scope="col">Action</th>
                       <?php endif ?>
                     </tr>
                   </thead>
                   <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($mutasi as $mts) : ?>
                      <tr>
                        <td class="text-pks font-weight-bold"><?php echo $i++ ?></td>
                        <td class="text-pks"><?=$mts['nama'] ?></td>
                        <td class="text-pks">
                          <?php if ($mts['jenis_mutasi'] == "Keluar"): ?>
                            <span class="badge badge-danger badge-sm"><?=$mts['jenis_mutasi'] ?></span>
                            <?php else : ?>
                              <span class="badge badge-success badge-sm"><?=$mts['jenis_mutasi'] ?></span>
                            <?php endif ?>
                          </td>
                          <td class="text-pks"><?=$mts['nama_dpc'] ?></td>
                          <td class="text-pks"><?=$mts['nama_dpra'] ?></td>
                          <td class="text-pks">
                            <?php if ($mts['file'] == ''): ?>
                              <b>Tidak ada file</b>
                              <?php else : ?>
                                <a target="_blank" class="btn btn-sm btn-pks" href="<?=base_url('assets/file/upload/').$mts['file'] ?>">Download</a>
                              <?php endif ?>

                            </td>
                            <td class="text-pks">
                              <?php if($mts['persetujuan'] == 0) : ?>
                                <span class="badge badge-danger badge-sm">Belum Disetujui</span>
                                <?php else :  ?>
                                  <span class="badge badge-success badge-sm">Disetujui</span>
                                <?php endif ?>  
                              </td>
                              <?php if ($user['role_id'] == 4): ?>
                               <?php if ($mts['persetujuan'] == 0): ?>
                                 <td width="100">
                                  <a href="<?= base_url('mutasi/edit_mutasi/') . $mts['id_mutasi'] ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                  <a data-toggle="modal" data-target="#deleteMutasiModal<?=$mts['id_mutasi']?>"  class="btn btn-danger btn-circle btn-sm"><i class="fas fa-fw fa-trash"></i></a>
                                </td>

                                <?php else : ?>
                                 <td width="100">
                                  <a href="#" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-fw fa-print"></i></a>
                                </td>
                              <?php endif ?>
                            <?php endif ?>
                          </tr>
                          <?php include "deleteMutasi_modal.php" ?>
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
