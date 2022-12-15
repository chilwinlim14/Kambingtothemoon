<section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Manajemen Kandang</h5>
                <a href="<?= base_url('kandang/tambah') ?>"><button type="button" class="btn btn-primary">
                  <i class="bi bi-plus-lg"></i> Tambah Kandang
                </button></a>
                <br><br>
                <!-- Table with stripped rows -->
                <div class="table-responsive pb-3" style="border: 0;">
                <table id="kandang" class="table">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama Kandang</th>
                      <th scope="col">Blok</th>
                      <th scope="col">Populasi (ekor)</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  
                </table>
                </div>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>