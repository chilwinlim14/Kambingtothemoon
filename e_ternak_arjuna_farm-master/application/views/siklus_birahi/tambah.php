<section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- TAMBAH Siklus Birahi -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Siklus Birahi</h5>
                  <?= form_open('siklus_birahi/save', array('enctype' => 'multipart/form-data', 'id' => 'tambah_siklus_birahi', 'class' => 'row g-3'), array('method' => 'add')) ?>

                  <!-- Tambah Siklus Birahi Form Elements -->
                    <div class="col-12">
                        <label for="inputNomortag" class="form-label">Nomor Tag (Betina)</label>
                        <select name="id_ternak_betina" class="select_box" style="width: 100%!important" data-live-search="true">
                        <?php foreach ($data_ternak_betina as $row) : ?>
                          <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for="inputTanggal" class="form-label">Tanggal Birahi (Proestrus)</label>
                      <input type="date" class="form-control" id="inputTanggal" name="proestrus" required>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="<?= base_url('siklus_birahi') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                  </form>
                  <!-- Tambah Siklus Birahi Form Elements -->
                  <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>