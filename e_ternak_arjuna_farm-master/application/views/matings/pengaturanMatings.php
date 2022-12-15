<section class="section">
        <div class="row">
            <div class="col-lg-12">
        <!-- Pengaturan Siklus Birahi -->
              <div class="card">
                <div class="card-body">

                  <!-- Pengaturan Matings Form Elements -->
                  <!-- <form class="row g-3"> -->

                    <h5 class="card-title">Kalender Kelahiran</h5>
                    <?= form_open('matings/pengaturan_save', array('id' => 'pengaturan_kawin', 'class' => 'row g-3'), array('method' => 'edit', 'id' => $siklus_kawin->id)) ?>
              
                    <h5>Isi Berapa Hari Setelah Kawin</h5>
                    <div class="col-12">
                        <label for="inputInkubasi" class="form-label">Inkubasi (dalam hari)</label>
                        <input type="number" class="form-control" name="inkubasi" value="<?= $siklus_kawin->inkubasi; ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputRemovemale" class="form-label">Pisah Jantan (dalam hari)</label>
                        <input type="number" class="form-control" name="pisah_jantan" value="<?= $siklus_kawin->pisah_jantan; ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputCekkehamilan" class="form-label">Cek Kehamilan (dalam hari)</label>
                        <input type="number" class="form-control" name="cek_hamil" value="<?= $siklus_kawin->cek_kehamilan; ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputTempatkawin" class="form-label">Pisah Kandang (dalam hari)</label>
                        <input type="number" class="form-control" name="pisah_kandang" value="<?= $siklus_kawin->pisah_kandang; ?>">
                    </div>

                    <div class="col-12"><br></div>

                    <h5>Isi Berapa Hari Setelah Lahiran</h5>
                    <div class="col-12">
                        <label for="inputKawinKembali" class="form-label">Kawin Kembali (dalam hari)</label>
                        <input type="number" class="form-control" name="kawin_kembali" value="<?= $siklus_kawin->kawin_kembali; ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputSapihAnak" class="form-label">Sapih Anak (dalam hari)</label>
                        <input type="number" class="form-control" name="sapih_anak" value="<?= $siklus_kawin->sapih_anak; ?>">
                    </div>

                    <div class="col-12"><br></div>

                    <!-- <h5>Detail Hasil Matings</h5>

                    <div class="col-1">
                        <label for="inputDetailMatingsJantan" class="form-label">Jantan</label>
                        <input type="number" class="form-control" id="inputDetailMatingsJantan">
                    </div>

                    <div class="col-1">
                        <label for="inputDetailMatingsBetina" class="form-label">Betina</label>
                        <input type="number" class="form-control" id="inputDetailMatingsBetina">
                    </div> -->

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="<?= base_url('matings') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                  </form><!-- Form Elements -->
                  <?= form_close();?>

            </div>
          </div>
        </div>
      </div>      
    </section>