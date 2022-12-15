<section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Laporan Keuangan</h5>
                <a href="<?= base_url('laporan_keuangan/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Laporan Keuangan</button></a>
              <br><br>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Nomor Tag</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Deskripsi</th>
                      <th scope="col">Pengeluaran</th>
                      <th scope="col">Pendapatan</th>
                      <th scope="col" class="text-center">Mengelola</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">30/06/2022</th>
                      <td>K0001</td>
                      <td>Initial Purchase</td>
                      <td>Purchase of K0001</td>
                      <td style="color: red; font-weight: bold">
                        Rp3.000.000,00
                      </td>
                      <td>Rp0,00</td>
                      <td class="text-center">
                        <a href="<?= base_url('laporan_keuangan/editLaporanKeuangan') ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                        <button type="button" class="btn btn-danger" onclick="hapus(${data})"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">30/06/2022</th>
                      <td>K0001</td>
                      <td>Sale</td>
                      <td>Sale of K0001</td>
                      <td style="color: red; font-weight: bold">Rp0,00</td>
                      <td>Rp3.500.000,00</td>
                      <td class="text-center">
                        <a href="<?= base_url('laporan_keuangan/editLaporanKeuangan') ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                        <button type="button" class="btn btn-danger" onclick="hapus(${data})"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
          </div>
        </div>
      </section>