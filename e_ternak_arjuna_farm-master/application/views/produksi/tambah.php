    <section class="section">

          <!-- Tambah Produksi -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Tambah Produksi</h5>
  
                    <!-- Tambah Produksi Form Elements -->
                    <?= form_open('produksi/save', array('enctype' => 'multipart/form-data', 'id' => 'tambah_produksi', 'class' => 'row g-3'), array('method' => 'add')) ?>
                      <div class="col-12">
                        <label for="inputNomortag" class="form-label">Nomor Tag</label>
                        <select name="id_ternak" class="select_box" style="width: 100%!important" data-live-search="true">
                          <?php foreach ($data_ternak as $row) : ?>
                            <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                          <?php endforeach; ?>
                        </select>
                        <small class="help-block"></small>
                      </div>
                      <div class="form-group">
                                <label for="produk">Produk</label>
                                <select name="produk" class="select_box2" style="width: 100%!important" data-live-search="true">
                                <?php foreach ($data_produk as $row) : ?>
                                  <option value="<?= $row->id_produk ?>"><?= $row->nama_produk ?></option>
                                <?php endforeach; ?>
                                </select>
                                <small class="help-block"></small>
                            </div>
                      <div class="form-group">
                          <label for="tanggal">Tanggal</label>
                          <input type="date" name="tanggal" class="form-control">
                          <small class="help-block"></small>
                      </div>
                      <div class="form-group">
                          <label for="jumlah">Jumlah</label>
                          <input type="text" name="jumlah" class="form-control">
                          <small class="help-block"></small>
                      </div>
                      <div class="form-group">
                          <label for="catatan">Catatan</label>
                          <input type="text" name="catatan" class="form-control">
                          <small class="help-block"></small>
                      </div>


                      <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('produksi') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                      </div>
                      <!-- Tambah Jurnal Ternak Form Elements -->
                      <?= form_close(); ?>
              </div>
            </div>

      </section>