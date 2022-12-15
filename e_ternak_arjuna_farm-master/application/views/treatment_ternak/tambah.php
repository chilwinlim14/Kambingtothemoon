<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- TAMBAH TREATMENT TERNAK -->
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Treatment Ternak</h5>

                  <!-- Tambah Treatment Ternak Form Elements -->
                  <?= form_open('treatment_ternak/save', array('id' => 'tambah_treatment_ternak', 'class' => 'row g-3'), array('method' => 'add','status_treatment'=>'Belum')) ?>
                            <!-- <form class="row g-3"> -->
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control">
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
                                <label for="id_treatment">Treatment</label>
                                <select name="id_treatment" class="select_box2" style="width: 100%!important" data-live-search="true">
                                <?php foreach ($data_treatment as $row) : ?>
                                  <option value="<?= $row->id_treatment ?>"><?= $row->nama_treatment ?></option>
                                <?php endforeach; ?>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('treatment_ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                            </div>
                            <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
</section>