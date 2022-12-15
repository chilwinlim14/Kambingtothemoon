<section class="section">
        <!-- TAMBAH laporan keuangan -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Edit Laporan Keuangan</h5>

                  <!-- Tambah Treatment Ternak Form Elements -->
                  <form class="row g-3">
                    <div class="col-12">
                      <label for="inputTanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control" id="inputTanggal" required="">
                    </div>

                    <div class="col-12">
                      <label for="inputNomorTag" class="form-label">Nomor Tag</label>
                      <input type="text" class="form-control" id="inputNomorTag" required="">
                    </div>

                    <div class="col-12">
                      <label for="inputKategori" class="form-label">Kategori</label>
                      <select class="form-select" aria-label="Default select example" required="">
                        <option value="pembelianawal">Pembelian Awal</option>
                        <option value="penjualan">Penjualan</option>
                        <option value="pengeluaranumum">Pengeluaran Umum</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for="inputDeskripsi" class="form-label">Deskripsi</label>
                      <input type="text" class="form-control" id="inputDeskripsi" required="">
                    </div>

                    <div class="col-12">
                      <label for="inputPengeluaran" class="form-label">Pengeluaran</label>
                      <input type="number" class="form-control" id="inputPengeluaran">
                    </div>

                    <div class="col-12">
                      <label for="inputCatatan" class="form-label">Pendapatan</label>
                      <input type="number" class="form-control" id="inputCatatan">
                    </div>

                    <div class="text-center">
                      <a href="<?= base_url('laporan_keuangan') ?>"><button type="button" class="btn btn-primary">Simpan</button></a>
                      <a href="<?= base_url('laporan_keuangan') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                  </form><!-- Tambah Treatment Ternak Form Elements -->
            </div>
          </div>
        </div>
      </div>
    </section>