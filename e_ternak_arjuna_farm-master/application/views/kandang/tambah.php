<section class="section">
        <!-- TAMBAH MATINGS -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Matings</h5>

                <!-- Tambah Matings Form Elements -->
                <?= form_open('kandang/save', array('id' => 'tambah_kandang_master', 'class' => 'row g-3'), array('method' => 'add')) ?>
                <!-- <form class="row g-3"> -->
                    <div class="form-group">
                        <label for="nama_kandang">Nama Kandang</label>
                        <input type="text" name="nama_kandang" class="form-control">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="blok">Blok Kandang</label>
                        <input type="text" name="blok" class="form-control">
                        <small class="help-block"></small>
                    </div>
                  <div class="text-center">
                    <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url("kandang")?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                  </div>
                <!-- </form> -->
                <?= form_close();?>
                <!-- Tambah matings Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>