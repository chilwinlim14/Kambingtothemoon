<section class="section">

  <!-- TAMBAH TERNAK -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Upload Foto Ternak</h5>

          <!-- Tambah Ternak Form Elements -->
          <?= form_open('ternak/save_foto_ternak', array('enctype' => 'multipart/form-data', 'id' => 'add_foto_ternak', 'class' => 'row g-3'), array('method' => 'add', 'id_ternak' => $data_ternak->id_ternak, 'nomor_tag' => $data_ternak->nomor_tag)) ?>

          <div class="form-group col-12">
            <label for="foto_ternak" class="form-label">Pilih Foto</label>
            <input class="form-control" type="file" id="foto_ternak" name="foto_ternak">
            <small class="help-block"></small>
          </div>
          <div class="form-group col-12">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
            <small class="help-block"></small>
          </div>

          <div class="text-center">
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
            <?php $url_back = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; ?>
            <a href="<?= $url_back ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>