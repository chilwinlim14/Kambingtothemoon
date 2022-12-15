<section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Perkawinan</h5>
                <a href="<?= base_url('matings/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Perkawinan</button></a>
                <a href="<?= base_url('matings/pengaturanMatings') ?>"><button type="button" class="btn btn-secondary"><i class="glyphicon glyphicon-heart"></i> Pengaturan Perkawinan</button></a>
              <br><br>
                <!-- Table with stripped rows -->
                <div class="table-responsive pb-3" style="border: 0;">
                <table id="data_matings" class="w-100 table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Pejantan</th>
                      <th scope="col">Induk</th>
                      <th scope="col">Tanggal Kawin</th>
                      <th scope="col">Pisah Jantan</th>
                      <th scope="col">Cek Kehamilan</th>
                      <th scope="col">Pisah Kandang</th>
                      <th scope="col">Lahiran</th>
                      <th scope="col">Sapih Anak</th>
                      <th scope="col">Kawin Kembali</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>