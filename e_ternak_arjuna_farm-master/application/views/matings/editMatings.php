<section class="section">
        <!-- TAMBAH MATINGS -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Matings</h5>

                <!-- Tambah Matings Form Elements -->
                <form class="row g-3">
                  <div class="col-12">
                    <label for="inputNomorTagPejantan" class="form-label"
                      >Nomor Tag Pejantan</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="inputNomorTagPejantan"
                    />
                  </div>

                  <div class="col-12">
                    <label for="inputNomorTagInduk" class="form-label"
                      >Nomor Tag Induk</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="inputNomorTagInduk"
                    />
                  </div>

                  <div class="col-12">
                    <label for="inputTanggalKawin" class="form-label"
                      >Tanggal Kawin</label
                    >
                    <input
                      type="date"
                      class="form-control"
                      id="inputTanggalKawin"
                    />
                  </div>
                  <div class="col-12">
                    <label for="inputNomorTagInduk" class="form-label"
                      >Detail</label
                    >
                  <div class="row g-3 align-items-center">
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
                  </div>

                  <div class="text-center">
                    <a href="<?=base_url("matings")?>"
                      ><button type="button" class="btn btn-primary">
                        Simpan
                      </button></a
                    >
                    <a href="<?=base_url("matings")?>"
                      ><button type="button" class="btn btn-secondary">
                        Batal
                      </button></a
                    >
                  </div>
                </form>
                <!-- Tambah matings Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>