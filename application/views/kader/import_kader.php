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
          <form action="<?= base_url('kader/import_excel'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <h6 class="text-pks font-weight-bold">Format Excel<a class="ml-4" href="<?=base_url('assets/file/template.xlsx') ?>">Download Disini</a></h6>
            </div>
            <br>
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
              <label for="" class="text-pks font-weight-bold">Dokumen Upload</label>
              <input style="height: 80px" type="file" class="form-control text-pks" id="fileExcel" name="fileExcel" placeholder="No Anggota...">
              <?= form_error('fileExcel', '<small class="text-danger">', '</small>') ?>
            </div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-pks">Import</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->