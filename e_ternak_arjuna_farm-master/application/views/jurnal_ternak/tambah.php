<section class="section">
        <!-- TAMBAH JURNAL TERNAK -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Jurnal Ternak</h5>

                  <!-- Tambah Jurnal Ternak Form Elements -->
                  <?= form_open('jurnal_ternak/save', array('enctype' => 'multipart/form-data', 'id' => 'tambah_jurnal_ternak', 'class' => 'row g-3'), array('method' => 'add')) ?>

                    <div class="col-12">
                      <label for="inputTanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control" id="inputTanggal" name="tanggal" required>
                    </div>
                    <div class="col-12">
                      <label for="inputNomortag" class="form-label">Nomor Tag</label>
                      <select name="id_ternak" class="select_box" style="width: 100%!important" data-live-search="true">
                        <?php foreach ($data_ternak as $row) : ?>
                          <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                        <?php endforeach; ?>
                      </select>
                      <small class="help-block"></small>
                    </div>

                    <div class="col-12">
                      <label for="inputTreatment" class="form-label">Catatan Jurnal</label>
                    <textarea name="catatan_jurnal" class="form-control"></textarea>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="<?= base_url('jurnal_ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                 <!-- Tambah Jurnal Ternak Form Elements -->
                 <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>