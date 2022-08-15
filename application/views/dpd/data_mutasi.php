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
                       <th scope="col">Action</th>
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
                          <td class="text-pks"><?=$mts['file'] ?></td>
                          <td class="text-pks">
                            <?php if($mts['persetujuan'] == 0) : ?>
                              <span class="badge badge-danger badge-sm">Belum Disetujui</span>
                              <?php else :  ?>
                                <span class="badge badge-success badge-sm">Disetujui</span>

                              <?php endif ?>  
                            </td>
                            <td width="100">
                              <a href="<?= base_url('dpd/detail_mutasi/').$mts['id_mutasi'] ?>" class="btn btn-warning btn-sm">Lihat Detail</a>
                            </td>
                          </tr>
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
