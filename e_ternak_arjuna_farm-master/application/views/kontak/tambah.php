<section class="section">
        <!-- TAMBAH KONTAK -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Kontak</h5>

                  <!-- Tambah Treatment Ternak Form Elements -->
                  <?= form_open('kontak/save', array('id' => 'tambah_kontak', 'class' => 'row g-3'), array('method' => 'add')) ?>
                <!-- <form class="row g-3"> -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="nomor_telepon">No.Telepon</label>
                        <input type="text" name="nomor_telepon" class="form-control">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" class="form-control">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <input type="text" name="catatan" class="form-control">
                        <small class="help-block"></small>
                    </div>
                  <div class="text-center">
                    <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                    <a href="<?=base_url("kontak")?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                  </div>
                <!-- </form> -->
                <?= form_close();?>
                  <!-- Tambah Treatment Ternak Form Elements -->
            </div>
          </div>
        </div>
      </div>
    </section>