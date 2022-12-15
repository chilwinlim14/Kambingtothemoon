    <section class="section profile">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Ternak</h5>
              <a href="<?= base_url('ternak/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Ternak</button></a>
              <br><br>

              <!-- Table with stripped rows -->
              <div class="table-responsive pb-3" style="border: 0;">
              <table id="ternak" class="w-100 table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Tag</th>
                    <th scope="col">Inisial</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Ras</th>
                  </tr>
                </thead>
                
              </table>
              <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>

        </div>


      </div>
    </section>