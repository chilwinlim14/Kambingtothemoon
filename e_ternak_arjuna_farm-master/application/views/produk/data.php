<section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Manajemen Produk</h5>
                <a href="<?= base_url('produk/tambah') ?>"><button type="button" class="btn btn-primary">
                  <i class="bi bi-plus-lg"></i> Tambah Produk
                </button></a>
                <br><br>
                <!-- Table with stripped rows -->
                <table id="produk" class="table">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama Produk</th>
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