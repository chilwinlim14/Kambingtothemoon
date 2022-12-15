<section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Diri Peternak</h5>
                <!-- Table with stripped rows -->
                
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >Inisial Peternakan</label>
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    readonly
                    value="<?= $data_peternak->inisial_peternakan ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >Nama Peternakan</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    
                    readonly
                    value="<?= $data_peternak->nama_peternakan ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >Pemilik</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    readonly
                    value="<?= $data_peternak->pemilik ?>"
                  />
                </div>

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >E-mail</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    readonly
                    value="<?= $data_peternak->email ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >No. Telepon</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    readonly
                    value="<?= $data_peternak->no_telpon ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label"
                    >Asosiasi</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleFormControlInput1"
                    readonly
                    value="<?= $data_peternak->asosiasi ?>"
                  />
                </div>
                <br />
                <div class="mb-3">
                <a href="<?= base_url('data_peternak/edit') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit Data</button></a>
                </div>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>