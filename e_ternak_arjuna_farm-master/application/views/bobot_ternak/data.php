<section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Bobot Ternak</h5>
                <a href="<?= base_url('bobot_ternak/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Bobot</button></a>
                <br><br>
                <!-- Table with stripped rows -->
                <table id="data_bobot_ternak" class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal Timbang</th>
                      <th scope="col">Nomor Tag</th>
                      <th scope="col">Umur</th>
                      <th scope="col">Bobot(KG)</th>
                      <th scope="col" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>