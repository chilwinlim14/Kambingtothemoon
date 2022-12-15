<section class="section profile">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body pt-3">

          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#galeri">Galeri</button>
            </li>
<!--
           <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#treatment">Treatment</button>
            </li>

          
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#heat-cycle">Siklus Birahi</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#matings">Perkawinan</button>
            </li> -->

          </ul>

          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <div class="col-lg-12 text-center" style="align-items: center;">
                <img src=" <?php
                            if ($data_ternak->foto_ternak != '') {
                              echo base_url() . "uploads/foto_ternak/" . $data_ternak->foto_ternak;
                            } else {
                              echo base_url() . "assets/dist/img/icon-goat.png";
                            } ?>" alt="foto" class="rounded-circle" width="200" height="200" style="border: solid 5px black;">
              </div>

              <p class="card-title" style="font-size: 30px; text-align: center;"><?= $data_ternak->inisial ?></p>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Nomor Tag</div>
                <div class="col-lg-9 col-md-8" id="nomor_tag"><?= $data_ternak->nomor_tag; ?></div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                <div class="col-lg-9 col-md-8"><?= ucfirst($data_ternak->jenis_kelamin); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                <div class="col-lg-9 col-md-8"><?= ucfirst($data_ternak->tanggal_lahir); ?> (estimasi)</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Umur</div>
                <div class="col-lg-9 col-md-8"><?= ucfirst($umur->umur); ?> (estimasi)</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Ras</div>
                <div class="col-lg-9 col-md-8"><?= ucfirst($data_ternak->ras); ?></div>
              </div>


              <div class="row">
                <div class="col-lg-3 col-md-4 label">Kandang</div>
                <div class="col-lg-9 col-md-8"><?= ucfirst($data_ternak->id_kandang); ?></div>
              </div>



              <div class="row">
                <div class="col-lg-3 col-md-4 label">Status</div>
                <div class="col-lg-9 col-md-8"><?= ucfirst($data_ternak->status); ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Bobot</div>
                <div class="col-lg-9 col-md-8"><?php if ($bobot) : echo $bobot->bobot . " kg";
                                                endif; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Bapak Ternak</div>
                <div class="col-lg-9 col-md-8"><?php if ($bapak) { ?>
                    <a href='<?= base_url('ternak/profil/') . $bapak->nomor_tag; ?>'><?= ucfirst($bapak->inisial) . " - " . $bapak->nomor_tag; ?></a>
                  <?php } ?>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Ibu Ternak</div>
                <div class="col-lg-9 col-md-8">
                  <?php if ($bapak) { ?>
                    <a href='<?= base_url('ternak/profil/') . $ibu->nomor_tag; ?>'><?= ucfirst($ibu->inisial) . " - " . $ibu->nomor_tag; ?></a>

                  <?php } ?>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Keterangan</div>
                <div class="col-lg-9 col-md-8"><?= ucfirst($data_ternak->keterangan); ?></div>
              </div>

              <div class="text-center">
                <a href="<?= base_url('ternak/editprofil/').$data_ternak->nomor_tag; ?>"><button type="button" class="btn btn-warning">Edit Profil</button></a>
                <a href="<?= base_url('ternak') ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
               
              </div>
            </div>

            <div class="tab-pane fade pt-3" id="galeri">
              <!-- Form untuk upload dan tampilkan galeri -->

              <head>
                <style>
                  .overlay {
                    position: absolute;
                    bottom: 22px;
                    background: rgba(225, 225, 225, 0.5);
                    color: #f1f1f1;
                    width: 185px;
                    transition: .5s ease;
                    opacity: 0;
                    color: white;
                    font-size: 10px;
                    padding: 10px;
                    text-align: center;
                  }

                  .container_image:hover .overlay {
                    opacity: 1;
                  }

                  .image-galeri {
                    height: 180px;
                    width: 100%;
                    object-fit: cover;
                    object-position: center;
                  }
                </style>
              </head>
              <div class="row">
                <div class="p-1 mb-2">
                  <a href="<?= base_url('ternak/add_foto_ternak/' . $data_ternak->nomor_tag) ?>"><button type="button" class="btn btn-primary"><i class="bi bi-upload"></i> &nbsp;Upload Foto Ternak</button></a>
                </div>

                <?php foreach ($foto_ternak->result() as $row) : ?>
                  <div class="container_image col-lg-2 col-md-2 col-sm-2 col-xs-6 p-1">
                    <img src="<?= base_url() . 'uploads/ternak_galeri/' . $row->foto ?>" class="image-galeri">
                    <div class="overlay">
                      <a href="<?= base_url() . 'ternak/edit_foto_ternak/' . $row->id . '/' . $data_ternak->nomor_tag ?>" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                      <button type="button" class="btn btn-sm btn-danger" onclick="hapus(<?= $row->id ?>)" title="hapus"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>

            <div class="tab-pane fade pt-3" id="treatment">

              <!-- Treatment -->
              <form>


                <div class="card-body">

                  <a href="tambahtreatmentternak.html"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Treatment</button></a>
                  <br><br>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nomor Tag</th>
                        <th scope="col">Treatment</th>
                        <th scope="col">Umur</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Mengelola</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">07/25/2022</th>
                        <td>K0001</td>
                        <td>Vaksinasi pertama KJ-0232</td>
                        <td>3 Bulan</td>
                        <td class="text-center"><span class="badge bg-success">Selesai</span></td>
                        <td class="text-center">
                          <a href="<?= base_url('treatment_ternak/edittreatment') ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                          <!-- <button type="button" class="btn btn-danger" onclick="hapus(${data})"><i class="fa fa-trash"></i></button> -->
                        </td>
                      </tr>

                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>


              </form><!-- End Treatment -->

            </div>

            <div class="tab-pane fade pt-3" id="heat-cycle">
              <!-- Heat Cycle -->
              <form>


                <div class="card-body">

                  <a href="<?= base_url('siklus_birahi/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Siklus Birahi</button></a>
                  <a href="<?= base_url('siklus_birahi/pengaturanBirahi') ?>"><button type="button" class="btn btn-secondary"><i class="bi bi-thermometer-half"></i> Pengaturan Siklus Birahi</button></a>
                  <br><br>

                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">Nomor Tag (Betina)</th>
                        <th scope="col">Proestrus</th>
                        <th scope="col">Estrus</th>
                        <th scope="col">Diestrus</th>
                        <th scope="col">Anestrus</th>
                        <th scope="col">Siklus Selanjutnya</th>
                        <th scope="col" class="text-center">Mengelola</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">K0001</th>
                        <td>06/30/2022</td>
                        <td>07/01/2022</td>
                        <td>07/03/2022</td>
                        <td>07/04/2022</td>
                        <td>07/21/2022</td>
                        <td class="text-center">
                          <a href="<?= base_url('siklus_birahi/editSiklusBirahi') ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                          <!-- <button type="button" class="btn btn-danger" onclick="hapus(${data})"><i class="fa fa-trash"></i></button> -->
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>

              </form><!-- End Heat Cycle -->

            </div>

            <div class="tab-pane fade pt-3" id="matings">
              <!-- Matings -->
              <form>

                <div class="card-body">
                  <a href="<?= base_url('matings/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Matings</button></a>
                  <a href="<?= base_url('matings/pengaturanMatings') ?>"><button type="button" class="btn btn-secondary"><i class="glyphicon glyphicon-heart"></i> Pengaturan Matings</button></a>
                  <br><br>
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">Pejantan</th>
                        <th scope="col">Induk</th>
                        <th scope="col">Tanggal Kawin</th>
                        <th scope="col">Pisah Jantan</th>
                        <th scope="col">Cek Kehamilan</th>
                        <th scope="col">Pisah Kandang</th>
                        <th scope="col">Lahiran</th>
                        <th scope="col">Sapih Anak</th>
                        <th scope="col">Kawin Kembali</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Mengelola</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">K0001</th>
                        <th>K0002</th>
                        <td>30/06/2022</td>
                        <td>30/06/2022</td>
                        <td>14/08/2022</td>
                        <td>07/11/2022</td>
                        <td>30/06/2023</td>
                        <td>8/10/2023</td>
                        <td>sold</td>
                        <td>1 Jantan 1 Betina</td>
                        <td class="text-center">
                          <a href="<?= base_url('matings/editMatings') ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                          <!-- <button type="button" class="btn btn-danger" onclick="hapus(${data})"><i class="fa fa-trash"></i></button> -->
                        </td>
                      </tr>

                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>
              </form><!-- End Matings -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>
    </div>
  </div>
</section>