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
                  <p>No Anggota : <b><?=$kader['no_anggota']?></b></p>
                  <p>DPC Asal : <b><?=$kader['nama_dpc']?></b></p>
                  <p>DPRa Asal : <b><?=$kader['nama_dpra']?></b></p>
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
              <div class="card shadow-lg mb-3">
                <div class="card-header">
                  <h6 class="text-pks font-weight-bold mb-0">Informasi Mutasi Kader</h6>
                </div>
                <div class="card-body text-pks">
                  <p>Tanggal Mutasi : <b><?=$mutasi['tanggal_mutasi']?></b></p>
                  <p>Jenis Mutasi : <b class="badge badge-danger badge-sm"><?=$mutasi['jenis_mutasi']?></b></p>
                  <p>DPC Tujuan : <b><?=$mutasi['nama_dpc']?></b></p>
                  <p>DPRa Tujuan : <b><?=$mutasi['nama_dpra']?></b></p>
                  <p>Catatan : <b><?=$mutasi['catatan']?></b></p>
                  <p>File Pendamping : <a target="_blank" class="btn btn-primary btn-sm" href="<?=base_url('assets/file/upload/').$mutasi['file'] ?>">Download</a></p>
                </div>
              </div>
              <div class="card shadow-lg">
                <div class="card-header">
                  <h6 class="text-pks font-weight-bold mb-0">Persetujuan Mutasi Kader</h6>
                </div>
                <div class="card-body text-pks">
                  <p>Dengan menekan button dibawah ini, maka anda menyetujui untuk Mutasi Kader dengan rincian data seperti diatas.</p>
                  <div class="form-group">
                    <button class="btn btn-pks" data-toggle="modal" data-target="#persetujuanModal">Setujui Mutasi</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->



<!-- Modal -->
<div class="modal fade" id="persetujuanModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-pks font-weight-bold" id="newMenuModalLabel">Persetujuan Mutasi Kader</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('dpd/proses_mutasi/').$id_mutasi ?>">
        <div class="modal-body">
          <p class="text-pks">Anda yakin data sudah benar?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-pks">Benar</button>
        </div>
      </form>
    </div>
  </div>
</div>