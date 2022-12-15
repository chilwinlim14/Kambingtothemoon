<section class="section">
      <div class="row">
        <div class="col-lg-12">



         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Siklus Birahi</h5>
              <a href="<?= base_url('siklus_birahi/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Siklus Birahi</button></a>
              <a href="<?= base_url('siklus_birahi/pengaturanBirahi') ?>"><button type="button" class="btn btn-secondary"><i class="bi bi-thermometer-half"></i> Pengaturan Siklus Birahi</button></a>
              <br><br>



            <!-- Table with stripped rows -->
          <div class="table-responsive pb-3" style="border: 0;">
            <table id="data_siklus_birahi" class="w-100 table table-striped table-bordered table-hover">
              <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nomor Tag (Betina)</th>
                    <th scope="col">Proestrus</th>
                    <th scope="col">Estrus</th>
                    <th scope="col">Diestrus</th>
                    <th scope="col">Anestrus</th>
                    <th scope="col">Siklus Selanjutnya</th>
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