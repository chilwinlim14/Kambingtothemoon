<section class="section">
        <!-- Edit JURNAL TERNAK -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Edit Jurnal Ternak</h5>

                  <!-- Edit Jurnal Ternak Form Elements -->
                  <?= form_open('jurnal_ternak/save', array('enctype' => 'multipart/form-data', 'id' => 'Edit_jurnal_ternak', 'class' => 'row g-3'), array('method' => 'edit','id_jurnal'=>$data_jurnal->id_jurnal)) ?>

                    <div class="col-12">
                      <label for="inputTanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control" id="inputTanggal" name="tanggal" required value="<?= $data_jurnal->tanggal; ?>">
                    </div>
                    <div class="col-12">
                      <label for="inputNomortag" class="form-label">Nomor Tag</label>
                      <select name="id_ternak" class="select_box" style="width: 100%!important" data-live-search="true">
                        <?php foreach ($data_ternak as $row){  
                          if($row->id_ternak == $data_jurnal->id_ternak){?>
                              <option selected value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                         <?php } else {
                          ?>
                          <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                        <?php }} ?>
                      </select>
                      <small class="help-block"></small>
                    </div>

                    <div class="col-12">
                      <label for="inputTreatment" class="form-label">Catatan Jurnal</label>
                    <textarea name="catatan_jurnal" class="form-control"><?= $data_jurnal->catatan_jurnal; ?></textarea>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="<?= base_url('jurnal_ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                 <!-- Edit Jurnal Ternak Form Elements -->
                 <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>