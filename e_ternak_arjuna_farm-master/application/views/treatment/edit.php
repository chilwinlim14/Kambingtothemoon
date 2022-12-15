<section class="section">
        <!-- Edit Treatment -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Treatment</h5>

                <!-- Edit Treatment Form Elements -->
                <?= form_open('treatment/save', array('id' => 'edit_treatment_master', 'class' => 'row g-3'), array('method' => 'edit', 'id_treatment' => $data_treatment->id_treatment)) ?>
                <!-- <form class="row g-3"> -->
                    <div class="form-group">
                        <label for="nama_treatment">Nama treatment</label>
                        <input type="text" name="nama_treatment" class="form-control" value="<?= $data_treatment->nama_treatment; ?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_treatment">Keterangan</label>
                        <textarea name="keterangan" class="form-control"><?= $data_treatment->keterangan; ?></textarea>
                        <small class="help-block"></small>
                    </div>
                  <div class="text-center">
                    <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url("treatment")?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                  </div>
                <!-- </form> -->
                <?= form_close();?>
                <!-- Edit Treatment Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>