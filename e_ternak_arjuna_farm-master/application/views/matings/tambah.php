<section class="section">
        <!-- TAMBAH MATINGS -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Matings</h5>

                <!-- Tambah Matings Form Elements -->

                <?= form_open('matings/save', array('id' => 'tambah_matings', 'class' => 'row g-3'), array('method' => 'add')) ?>
                           
                  <div class="col-12">
                    <label for="inputNomorTagPejantan" class="form-label"
                      >Nomor Tag Pejantan</label
                    >
                    <select name="id_ternak_jantan" class="select_box" style="width: 100%!important" data-live-search="true">
                    <option value="">Pilih Pejantan</option>
                    <?php foreach ($pejantan as $row) : ?>
                      <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>

                  <div class="col-12">
                    <label for="inputNomorTagInduk" class="form-label"
                      >Nomor Tag Induk</label
                    >
                    <select name="id_ternak_betina" class="select_box2" style="width: 100%!important" data-live-search="true">
                    <option value="">Pilih Indukan Betina</option>
                    <?php foreach ($indukan as $row) : ?>
                      <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>

                  <div class="col-12">
                    <label for="inputTanggalKawin" class="form-label"
                      >Tanggal Kawin</label
                    >
                    <input
                      type="date"
                      class="form-control"
                      id="inputTanggalKawin"
                      name="tanggal_kawin" 
                      required
                    />
                  </div>
                  <div class="col-12">
                    <!-- <label for="inputNomorTagInduk" class="form-label"
                      >Detail</label
                    > -->
                  <!-- <div class="row g-3 align-items-center">
                    <div class="col-auto" >
                      <label for="inputPassword6" class="col-form-label" 
                        >Jantan</label
                      >
                    </div>
                    <div class="col-sm-1">
                      <input
                      style="margin-left: 28px;"
                        type="number"
                        class="form-control"
                        id="inputJumlahJantan"
                      />
                    </div>
                  </div>
                  <div class="row g-3 align-items-center" >
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label"
                        >Betina</label
                      >
                    </div>
                    <div class="col-sm-1">
                      <input
                      style="margin-left: 27px;"
                        type="number"
                        class="form-control"
                        id="inputJumlahJantan"
                      />
                    </div>
                  </div>
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label"
                        >Lahir Mati</label
                      >
                    </div>
                    <div class="col-sm-1">
                      <input
                        type="number"
                        class="form-control"
                        id="inputJumlahJantan"
                      />
                    </div>
                  </div> -->

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                      </button>
                    <a href="<?=base_url("matings")?>"
                      ><button type="button" class="btn btn-secondary">
                        Batal
                      </button></a
                    >
                  </div>
                  <?= form_close(); ?>
                <!-- Tambah matings Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>