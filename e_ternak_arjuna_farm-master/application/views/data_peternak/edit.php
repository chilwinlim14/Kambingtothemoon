<section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Data Diri Peternak</h5>
                <!-- Table with stripped rows -->
                <?= form_open('data_peternak/save', array('id' => 'edit_peternak')) ?>
                <div class="mb-3">
                  <label for="inisial" class="form-label"
                    >Inisial Peternakan</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inisial"
                    name="inisial"
                    value="<?= $data_peternak->inisial_peternakan ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="nama_peternak" class="form-label"
                    >Nama Peternakan</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="nama_peternak"
                    name="nama_peternak"
                    value="<?= $data_peternak->nama_peternakan ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="pemilik" class="form-label"
                    >Pemilik</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="pemilik"
                    name="pemilik"
                    value="<?= $data_peternak->pemilik ?>"
                  />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label"
                    >E-mail</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="<?= $data_peternak->email ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="no_telpon" class="form-label"
                    >No. Telepon</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="no_telpon"
                    name="no_telpon"
                    value="<?= $data_peternak->no_telpon ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="asosiasi" class="form-label"
                    >Asosiasi</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="asosiasi"
                    name="asosiasi"
                    value="<?= $data_peternak->asosiasi ?>"
                  />
                </div>
                <br />
                <button type="submit" class="btn btn-primary">
                  Simpan
                </button>
                <!-- End Table with stripped rows -->
                <?= form_close() ?>
              </div>
            </div>
          </div>
        </div>
      </section>