<section class="section profile">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body pt-3">

          <div class="tab-content pt-2">
            <div class="tab-pane fade show active profile-edit" id="profile-edit">

              <!-- Profile Edit Form -->
              <?= form_open('diet_ternak/save', array('id' => 'edit_diet_ternak', 'class' => 'row g-3'), array('method' => 'edit', 'id_diet' => $data_diet->id_diet)) ?>
              <!-- <form class="row g-3"> -->
              <div class="form-group">
                <label for="hari">Hari</label>
                <select class="form-select" name="hari" aria-label="Pilih Hari">
                  <option value="Setiap Hari" <?php if ($data_diet->hari == 'Setiap Hari') echo 'selected' ?>>Setiap Hari</option>
                  <option value="Senin" <?php if ($data_diet->hari == 'Senin') echo 'selected' ?>>Senin</option>
                  <option value="Selasa" <?php if ($data_diet->hari == 'Selasa') echo 'selected' ?>>Selasa</option>
                  <option value="Rabu" <?php if ($data_diet->hari == 'Rabu') echo 'selected' ?>>Rabu</option>
                  <option value="Kamis" <?php if ($data_diet->hari == 'Kamis') echo 'selected' ?>>Kamis</option>
                  <option value="Jumat" <?php if ($data_diet->hari == 'Jumat') echo 'selected' ?>>Jumat</option>
                  <option value="Sabtu" <?php if ($data_diet->hari == 'Sabtu') echo 'selected' ?>>Sabtu</option>
                  <option value="Minggu" <?php if ($data_diet->hari == 'Minggu') echo 'selected' ?>>Minggu</option>
                </select>
                <small class="help-block"></small>
              </div>
              <div class="form-group">
                <label for="waktu_pemberian">Waktu</label>
                <input type="text" name="waktu_pemberian" class="form-control" id="datetimepicker3" value="<?= $data_diet->waktu_pemberian; ?>">
                <small class="help-block"></small>
              </div>
              <div class="form-group">
                <label for="kandang">Kandang</label>
                <input type="text" name="kandang" class="form-control" value="<?= $data_diet->kandang; ?>">
                <small class="help-block"></small>
              </div>
              <div class="form-group">
                <label for="pakan">Pakan</label>
                <input type="text" name="pakan" class="form-control" value="<?= $data_diet->pakan ?>">
                <small class="help-block"></small>
              </div>
              <div class="text-center">
                <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('diet_ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
              </div>
              <?= form_close(); ?>
              <!-- End Profile Edit Form -->
            </div>
          </div>
        </div><!-- End Bordered Tabs -->
      </div>
    </div>
  </div>
  </div>
</section>