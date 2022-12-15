<section class="section">
        <!-- TAMBAH Produk -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Produk</h5>

                <!-- Tambah Produk Form Elements -->
                <?= form_open('produk/save', array('id' => 'edit_produk_master', 'class' => 'row g-3'), array('method' => 'edit', 'id_produk' => $data_produk->id_produk)) ?>
                <!-- <form class="row g-3"> -->
                    <div class="form-group">
                        <label for="nama_produk">Nama produk</label>
                        <input type="text" name="nama_produk" class="form-control" value="<?= $data_produk->nama_produk; ?>">
                        <small class="help-block"></small>
                    </div>
                    
                  <div class="text-center">
                    <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url("produk")?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                  </div>
                <!-- </form> -->
                <?= form_close();?>
                <!-- Tambah Produk Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>