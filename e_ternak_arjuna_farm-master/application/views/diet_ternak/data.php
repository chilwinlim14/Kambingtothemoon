<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pakan Ternak</h5>
          
          <a href="<?= base_url('diet_ternak/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Pakan</button></a>
          <button type="button" onclick="reload_ajax()" class="btn btn-secondary"><i class="fa fa-refresh"></i> Reload</button>
          <br><br>
          <!-- Table with stripped rows -->
          <div class="table-responsive pb-3" style="border: 0;">
            <table id="data_diet_ternak" class="w-100 table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Hari</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Kandang</th>
                  <th scope="col">Pakan</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
  </div>
</section>