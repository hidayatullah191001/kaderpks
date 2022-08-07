<!-- Modal -->
<div class="modal fade" id="editsubmenumodal<?=$sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-pks font-weight-bold" id="newMenuModalLabel">Edit Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('menu/edit/').$sm['id'] ?>">
        <div class="modal-body">
         <div class="form-group">
           <input type="text" class="form-control text-pks" id="title" name="title" placeholder="Submenu title" value="<?=$sm['title'] ?>">
         </div>
         <div class="form-group">
          <select class="form-control text-pks" name="menu_id" id="menu_id">
            <?php foreach ($menu as $mn ): ?>
              <?php if ($sm['menu_id'] == $mn['id']) {
                echo "<option selected value= '".$mn['id']."'>".$mn['menu']."</option>'";
              } else{
                echo "<option value= '".$mn['id']."'>".$mn['menu']."</option>'";
              }
              ?>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
         <input type="text"class="form-control text-pks" id="url" name="url" placeholder="Submenu url" readonly="" value="<?=$sm['url'] ?>">
       </div>
       <div class="form-group">
         <input type="text"class="form-control text-pks" id="icon" name="icon" placeholder="Submenu icon" value="<?=$sm['icon'] ?>">
       </div>
       <div class="form-group">
         <div class="form-check">
          <?php
          $data = array(
            'class' => 'form-check-input text-pks'
          );
           if ($sm['is_active'] == 0): ?>
          <?= form_checkbox('is_active','1',FALSE, $data)."Active?";?>
        <?php endif ?>

        <?php if ($sm['is_active'] == 1): ?>
          <?= form_checkbox('is_active','1',TRUE, $data)."Active?";?>
        <?php endif ?>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-pks">Edit</button>
  </div>
</form>
</div>
</div>
</div>