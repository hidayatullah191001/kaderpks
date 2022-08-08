<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="font-weight-bold text-pks py-3 mb-0"><?= $title ?></h4>

  <div class="row">
    <div class="col">
      <?= $this->session->flashdata('message') ?>
      <div class="card shadow-lg my-5">
        <div class="card-header bg-white">
          <a style="text-decoration: none;" href="<?=base_url('kader/') ?>"  class="orangePks font-weigth-bold"><i class="fas fa-fw fa-arrow-left mr-2"></i>Kembali</a>
        </div>
        <div class="card-body">
          <form method="post" action="">
            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">DPC</label>
              <input type="text" class="form-control text-pks" id="dpc" name="dpc" value="<?=$dpc['nama_dpc'] ?>" readonly>
              <?= form_error('dpc', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">DPRa</label>
              <input type="text" class="form-control text-pks" id="dpra" name="dpra" value="<?=$dpra['nama_dpra'] ?>" readonly>
              <?= form_error('dpra', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">No Anggota</label>
              <input type="text" class="form-control text-pks" id="no_anggota" name="no_anggota" placeholder="No Anggota...">
              <?= form_error('no_anggota', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Nama</label>
              <input type="text" class="form-control text-pks" id="nama_kader" name="nama_kader" placeholder="Nama Kader...">
              <?= form_error('nama_kader', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">NIK</label>
              <input type="text" class="form-control text-pks" id="nik_kader" name="nik_kader" placeholder="NIK Kader...">
              <?= form_error('nik_kader', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">No Hp Kader</label>
              <input type="text" class="form-control text-pks" id="no_hp_kader" name="no_hp_kader" placeholder="No Hp Kader...">
              <?= form_error('no_hp_kader', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Email</label>
              <input type="text" class="form-control text-pks" id="email" name="email" placeholder="Email Kader...">
              <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Alamat</label>
              <textarea type="text" class="form-control text-pks" id="alamat" name="alamat" placeholder="Alamat..."></textarea>
              <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Pembina</label>
              <input type="text" class="form-control text-pks" id="pembina" name="pembina" placeholder="Pembina Kader...">
              <?= form_error('pembina', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Pendidikan</label>
              <input type="text" class="form-control text-pks" id="pendidikan" name="pendidikan" placeholder="Pendidikan Kader...">
              <?= form_error('pendidikan', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Catatan</label>
              <textarea type="text" class="form-control text-pks" id="catatan" name="catatan" placeholder="Catatan(Opsional)..."></textarea>
              <?= form_error('catatan', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-pks">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->