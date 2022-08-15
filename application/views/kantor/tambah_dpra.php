<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h4 class="font-weight-bold text-pks py-3 mb-0"><?= $title ?></h4>

  <div class="row">
    <div class="col">
      <?= $this->session->flashdata('message') ?>
      <div class="card shadow-lg my-5">
        <div class="card-header bg-white">
          <a style="text-decoration: none;" href="<?=base_url('kantor/data_dpra') ?>"  class="orangePks font-weigth-bold"><i class="fas fa-fw fa-arrow-left mr-2"></i>Kembali</a>
        </div>
        <div class="card-body">
          <form method="post" action="">
            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Kantor DPC</label>
              <select class="form-control border selectpicker" name="id_dpc" data-live-search="true">
                <option disabled="" selected="">Cari kantor DPC...</option>
                <?php foreach ($dpc as $dpc): ?>
                  <option data-token = "<?=$dpc['nama_dpc'] ?>" value="<?=$dpc['id'] ?>"><?=$dpc['nama_dpc'] ?></option>
                <?php endforeach ?>
              </select>
              <?= form_error('id_dpc', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Nama Kantor DPRa</label>
              <input type="text" class="form-control text-pks" id="nama_dpra" name="nama_dpra" placeholder="Nama kantor DPC...">
              <?= form_error('nama_dpra', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">No Handphone Kantor</label>
              <input type="text" class="form-control text-pks" id="no_hp" name="no_hp" placeholder="No Handphone kantor...">
              <?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="" class="text-pks font-weight-bold">Alamat Kantor</label>
              <textarea type="text" class="form-control text-pks" id="alamat" name="alamat" placeholder="Alamat..."></textarea>
              <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
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