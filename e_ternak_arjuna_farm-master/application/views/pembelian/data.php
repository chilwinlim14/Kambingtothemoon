      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pembelian</h5>
                <a href="<?= base_url('pembelian/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Pembelian</button></a>
                <br><br>
                <div class="table-responsive pb-3" style="border: 0;">
                <table id="pembelian" class="w-100 table table-striped table-bordered table-hover">
                 <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Nomor Tag</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Penjual</th>
                      <th scope="col">Keterangan</th>
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