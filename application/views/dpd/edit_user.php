<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?=$title ?></h1>
  <div class="card">
    <div class="card-header">
      <a style="text-decoration: none;" href="<?=base_url('dpd/user_management') ?>"  class="orangePks font-weigth-bold"><i class="fas fa-fw fa-arrow-left mr-2"></i>Kembali</a>
    </div>
    <div class="card-body">
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $edit['id']; ?>">
        <div class="form-group">
          <label for="title" class="text-pks font-weight-bold">Nama</label>
          <input type="title" class="form-control text-pks" id="name" name="name" value="<?= $edit['name'];?>">
          <small class="form-text text-danger"><?= form_error('name'); ?></small>
        </div>
        <div class="form-group">
          <label for="url" class="text-pks font-weight-bold">Email</label>
          <input type="text" class="form-control text-pks" id="email" name="email" value="<?= $edit['email'];?>" readonly>
          <small class="form-text text-danger"><?= form_error('email'); ?></small>
        </div>
        <div class="form-group">
          <label for="icon" class="text-pks font-weight-bold">Role</label>
          <select id="same" class="form-control text-pks" id="role_id" name="role_id">
            <?php foreach ($role as $rl) :?>
             <?php if ($rl['id_role'] != 1): ?>
               <?php if ($rl['id_role'] == $edit['role_id']): ?>
                 <option selected="" value="<?=$rl['id_role'];?>"><?=$rl['role'] ?></option>
                 <?php else : ?>
                  <option value="<?=$rl['id_role'];?>"><?=$rl['role'] ?></option>
                <?php endif ?>
              <?php endif ?>
            <?php endforeach ?>
          </select>
          <small class="form-text text-danger"><?= form_error('role_id'); ?></small>
        </div>
        <div class="form-group">
          <label for="" class="text-pks font-weight-bold">DPC</label>
          <select name="select_dpc" id="select_dpc" class="form-control select2 text-pks">
            <?php if ($edit['dpc'] == 0): ?>
              <option selected="" value="0" >Pilih DPC</option>
              <?php else : ?>
                <?php foreach ($dpc as $dpc): ?>
                  <?php if ($dpc['id'] == $edit['dpc']): ?>
                    <option selected="" value="<?=$dpc['id'] ?>" ><?=$dpc['nama_dpc']  ?></option>
                  <?php endif ?>
                <?php endforeach ?>
              <?php endif ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="text-pks font-weight-bold">DPRa</label>
            <select name="select_dpra" id="select_dpra" class="form-control select2 text-pks">
              <?php if ($edit['dpra'] == 0): ?>
                <option selected="" value="0" >Pilih DPRa</option>
                <?php else : ?>
                  <?php foreach ($dpra as $dpra): ?>
                    <?php if ($dpra['id'] == $edit['dpra']): ?>
                      <option selected="" value="<?=$dpra['id'] ?>" ><?=$dpra['nama_dpra']  ?></option>
                    <?php endif ?>
                  <?php endforeach ?>
                <?php endif ?>
              </select>
            </select>
          </div>
          <div class="form-group">
            <label for="mobile-id-icon" class="text-pks font-weight-bold">Aktif</label>
            <div class='form-check text-pks'>
              <div class="checkbox mt-2">
                <?php if ($edit['is_active'] == 0): ?>
                  <?= form_checkbox('is_active','1',FALSE)."Aktif kan Akun";?>
                <?php endif ?>
                <?php if ($edit['is_active'] == 1): ?>
                  <?= form_checkbox('is_active','1',TRUE)."Aktif kan Akun";?>
                <?php endif ?>
              </div>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-pks">Edit</button>
        </form>
      </div>
    </div>
    <br>
  </div>
</div>

