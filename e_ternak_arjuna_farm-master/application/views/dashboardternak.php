<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Shortc Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                    <a href="<?= base_url('ternak') ?>">
                        <div class="card-body"> 
                            <h5 class="card-title"><span>| Manajemen Ternak</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bxl-baidu"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Daftar Ternak</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                    <a href="<?= base_url('jurnal_ternak') ?>">
                        <div class="card-body">
                            <h5 class="card-title"><span>| Manajemen Ternak</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar2-plus-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Jurnal Ternak</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                        <a href="<?= base_url('treatment') ?>">
                            <h5 class="card-title"><span>| Manajemen Kesehatan</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar2-plus-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Treatment Ternak</h6>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                    <a href="<?= base_url('bobot_ternak') ?>">
                        <div class="card-body">
                            <h5 class="card-title"><span>| Manajemen Kesehatan</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar2-plus-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Bobot Ternak</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div><!-- End Sales Card -->     
                
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                    <a href="<?= base_url('siklus_birahi') ?>">
                        <div class="card-body">
                            <h5 class="card-title"><span>| Manajemen Pembiakan</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar2-date-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Siklus Birahi</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                    <a href="<?= base_url('matings') ?>">
                        <div class="card-body">
                            <h5 class="card-title"><span>| Manajemen Pembiakan</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar2-date-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Perkawinan </h6>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div><!-- End Sales Card -->

               
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Hari Ini</a></li>
                                <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                                <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Treatment Ternak <span>| Selanjutnya ...</span></h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nomor Tag</th>
                                        <th scope="col">Treatment</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Kandang</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data_treatment as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $row->tanggal ?></th>                                        
                                        <td><a href="<?= base_url('ternak/profil/').$row->nomor_tag ?>" class="text-primary"><?= $row->inisial ?></a></td>
                                        <td><?= $row->nama_treatment ?></td>
                                        <td><?= $row->umur_treatment ?></td>
                                        <td><?= $row->kandang ?></td>
                                        <td><?php
                                        if($row->status_treatment == 'Selesai'){
                                            echo "<span class='badge bg-success'>$row->status_treatment</span>"; 
                                        } else if($row->status_treatment == 'Belum'){
                                            echo "<span class='badge bg-warning'>$row->status_treatment</span>";
                                        }  else if($row->status_treatment == 'Batal'){
                                            echo "<span class='badge bg-danger'>$row->status_treatment</span>";
                                        }
                                        ?></td>
                                        <td>
                                        <a class="btn btn-sm btn-warning" href="<?= base_url('treatment_ternak/edittreatment/').$row->id_treatment_ternak ?>" title="edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->
                 <!-- Kawin Sales -->
                 <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Catatan Kawin <span>| Selanjutnya ...</span></h5>

                            <table id="data_matings" class="table table-borderless datatable">
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
                                </tr>
                            </thead>
                           <tbody>
                           <?php foreach ($data_matings as $row) : ?>
                                <tr>
                                <td><a href="<?= base_url('ternak/profil/').$row->pejantan ?>" class="text-primary"><?= $row->pejantan ?></a></td>
                                <td><a href="<?= base_url('ternak/profil/').$row->indukan ?>" class="text-primary"><?= $row->indukan ?></a></td>
                                <td><?= $row->tanggal_kawin ?></td>
                                <td><?= $row->pisah_jantan ?></td>
                                <td><?= $row->cek_kehamilan ?></td>
                                <td><?= $row->pisah_kandang ?></td>
                                <td><?= $row->lahiran ?></td>
                                <td><?= $row->sapih ?></td>
                                <td><?= $row->kawin_kembali ?></td>
                              
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->
            </div>
        </div><!-- End Left side columns -->

    </div>
</section>