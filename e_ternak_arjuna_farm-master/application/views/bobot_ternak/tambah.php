<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- TAMBAH BOBOT TERNAK -->
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Bobot Ternak</h5>

                  <!-- Tambah Bobot Ternak Form Elements -->
                  <?= form_open('bobot_ternak/save', array('id' => 'tambah_bobot_ternak', 'class' => 'row g-3'), array('method' => 'add')) ?>
                            <!-- <form class="row g-3"> -->
                            <div class="form-group">
                                <label for="tanggal_timbang">Tanggal</label>
                                <input type="date" name="tanggal_timbang" class="form-control">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="id_ternak">Nomor Tag</label>
                                <select name="id_ternak" class="select_box" style="width: 100%!important" data-live-search="true">
                                <?php foreach ($data_ternak as $row) : ?>
                                  <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                                <?php endforeach; ?>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="umur_timbang">Umur</label>
                                <input type="text" name="umur_timbang" class="form-control">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot(KG)</label>
                                <input type="text" name="bobot" class="form-control">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="hamil">Hamil</label>
                                <input type="text" name="hamil" class="form-control">
                                <small class="help-block"></small>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('bobot_ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                            </div>
                            <?= form_close(); ?>
                  <!-- Tambah Bobot Form Elements -->
                  
            </div>
          </div>
        </div>
      </div>
</section>