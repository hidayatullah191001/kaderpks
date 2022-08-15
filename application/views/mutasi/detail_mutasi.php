<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="font-weight-bold text-pks py-3 mb-0"><?= $title ?></h4>

  <div class="row">
    <div class="col">
      <?= $this->session->flashdata('message') ?>
      <div class="card shadow-lg my-5">
        <div class="card-header bg-white">
          <a style="text-decoration: none;" href="<?=base_url('mutasi/') ?>"  class="orangePks font-weigth-bold"><i class="fas fa-fw fa-arrow-left mr-2"></i>Kembali</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-5">
              <div class="card shadow-lg">
                <div class="card-header">
                  <h6 class="text-pks font-weight-bold mb-0">Informasi Kader</h6>
                </div>
                <div class="card-body text-pks">
                  <p>DPC : <b><?=$kader['nama_dpc']?></b></p>
                  <p>DPRa : <b><?=$kader['nama_dpra']?></b></p>
                  <p>No Anggota : <b><?=$kader['no_anggota']?></b></p>
                  <p>Nama Anggota : <b><?=$kader['nama']?></b></p>
                  <p>NIK : <b><?=$kader['nik']?></b></p>
                  <p>Email : <b><?=$kader['email']?></b></p>
                  <p>Alamat : <b><?=$kader['alamat']?></b></p>
                  <p>Pembina : <b><?=$kader['pembina']?></b></p>
                  <p>Pendidikan : <b><?=$kader['pendidikan']?></b></p>
                  <p>Tanggal Daftar : <b><?=$kader['tanggal_daftar']?></b></p>
                </div>
              </div>
            </div>

            <div class="col-md-7">
              <div class="card shadow-lg">
                <div class="card-header">
                  <h6 class="text-pks font-weight-bold mb-0">Mutasi Kader</h6>
                </div>
                <div class="card-body text-pks">
                  <form method="post" action="" enctype="multipart/form-data" >
                    <div class="form-group">
                      <label for="" class="text-pks font-weight-bold">Jenis Mutasi</label>
                      <select class="form-control text-pks" id="jenis" name="jenis">
                        <option disabled="" selected="">Pilih Opsi</option>
                        <option value="Masuk" class="text-pks">Masuk</option>
                        <option value="Keluar" class="text-pks">Keluar</option>
                      </select>
                      <?= form_error('jenis_mutasi', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                      <label for="" class="text-pks font-weight-bold">DPC</label>
                      <select name="dpc_id" id="dpc_id" class="form-control select2 text-pks">
                        <option value="0">Select DPC</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="" class="text-pks font-weight-bold">DPRa</label>
                      <select name="dpra_id" id="dpra_id" class="form-control select2">
                        <option value="0">Select DPRa</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="" class="text-pks font-weight-bold">Catatan</label>
                      <textarea name="catatan" id="catatan" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="" class="text-pks font-weight-bold">File Pendamping</label>
                      <input type="file" class="form-control text-pks" id="file" name="file" placeholder="Pilih file...">
                      <?= form_error('file', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-pks" type="submit">Ajukan Mutasi</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

