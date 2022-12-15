<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- TAMBAH BOBOT TERNAK -->
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Edit Bobot Ternak</h5>

                  <!-- Tambah Bobot Ternak Form Elements -->
                  <?= form_open('bobot_ternak/save', array('id' => 'edit_bobot_ternak', 'class' => 'row g-3'), array('method' => 'edit', 'id_bobot' => $data_bobot->id_bobot)) ?>
                            <!-- <form class="row g-3"> -->
                            <div class="form-group">
                                <label for="tanggal_timbang">Tanggal</label>
                                <input type="date" name="tanggal_timbang" class="form-control" value="<?= $data_bobot->tanggal_timbang; ?>">
                                <small class="help-block"></small>
                            </div>
                            <div class="col-12">
                              <label for="inputNomortag" class="form-label">Nomor Tag</label>
                              <select name="id_ternak" class="select_box" style="width: 100%!important" data-live-search="true">
                                <?php foreach ($data_ternak as $row){  
                                  if($row->id_ternak == $data_bobot->id_ternak){?>
                                      <option selected value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                                <?php } else {
                                  ?>
                                  <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                                <?php }} ?>
                              </select>
                              <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="umur_timbang">Umur</label>
                                <input type="text" name="umur_timbang" class="form-control"  value="<?= $data_bobot->umur_timbang; ?>">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot(KG)</label>
                                <input type="text" name="bobot" class="form-control" required value="<?= $data_bobot->bobot; ?>">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="hamil">Hamil</label>
                                <input type="text" name="hamil" class="form-control" required value="<?= $data_bobot->hamil; ?>">
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