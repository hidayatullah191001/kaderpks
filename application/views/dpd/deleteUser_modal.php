
<!-- Modal -->
<div class="modal fade" id="deleteUserModal<?=$sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-pks font-weight-bold" id="newMenuModalLabel">Delete Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('dpd/hapus_user/').$sm['id'] ?>">
        <div class="modal-body text-pks">
          <p>Data akan dihapus secara permanen. Apakah kamu ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>