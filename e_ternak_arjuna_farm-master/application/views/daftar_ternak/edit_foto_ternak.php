<section class="section">

  <!-- TAMBAH TERNAK -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Foto Ternak</h5>

          <!-- Tambah Ternak Form Elements -->
          <?= form_open('ternak/save_foto_ternak', array('enctype' => 'multipart/form-data', 'id' => 'edit_foto_ternak', 'class' => 'row g-3'), array('method' => 'edit', 'id' => $foto_ternak->id, 'nomor_tag' => $nomor_tag)) ?>

          <div class="form-group col-12">
            <label for="foto_ternak" class="form-label">Pilih Foto</label>
            <div class="mb-2">
              <img src="<?= base_url() ?>uploads/ternak_galeri/<?= $foto_ternak->foto; ?>" class="img-responsive img-thumbnail" alt="User Image" style="width:300px">
            </div>
            <input class="form-control" type="file" id="foto_ternak" name="foto_ternak">
            <small class="help-block"></small>
          </div>
          <div class="form-group col-12">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"><?= $foto_ternak->keterangan; ?></textarea>
            <small class="help-block"></small>
          </div>

          <div class="text-center">
            <button type="submit" id="submit" class="btn btn-primary">Update</button>
            <?php $url_back = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; ?>
            <a href="<?= $url_back ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>