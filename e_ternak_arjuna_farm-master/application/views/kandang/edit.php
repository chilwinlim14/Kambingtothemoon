<section class="section">
        <!-- TAMBAH MATINGS -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Matings</h5>

                <!-- Tambah Matings Form Elements -->
                <?= form_open('kandang/save', array('id' => 'edit_kandang_master', 'class' => 'row g-3'), array('method' => 'edit', 'id_kandang' => $data_kandang->id_kandang)) ?>
                <!-- <form class="row g-3"> -->
                    <div class="form-group">
                        <label for="nama_kandang">Nama Kandang</label>
                        <input type="text" name="nama_kandang" class="form-control" value="<?= $data_kandang->nama_kandang; ?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_kandang">Blok Kandang</label>
                        <input type="text" name="blok" class="form-control" value="<?= $data_kandang->blok; ?>">
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