<section class="section">
        <!-- TAMBAH Treatment -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Treatment</h5>

                <!-- Tambah Treatment Form Elements -->
                <?= form_open('treatment/save', array('id' => 'tambah_treatment_master', 'class' => 'row g-3'), array('method' => 'add')) ?>
                <!-- <form class="row g-3"> -->
                    <div class="form-group">
                        <label for="nama_treatment">Nama treatment</label>
                        <input type="text" name="nama_treatment" class="form-control">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_treatment">Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                        <small class="help-block"></small>
                    </div>
                  <div class="text-center">
                    <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url("treatment")?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                  </div>
                <!-- </form> -->
                <?= form_close();?>
                <!-- Tambah Treatment Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>