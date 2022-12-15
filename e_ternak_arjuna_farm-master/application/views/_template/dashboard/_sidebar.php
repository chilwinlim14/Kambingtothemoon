<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php
        $page = $this->uri->segment(1);
        $ternak = ["ternak", "jurnal_ternak", "silsilah_keluarga"];
        $kesehatan = ["treatment_ternak", "diet_ternak", "bobot_ternak"];
        $pembiakan = ["siklus_birahi", "matings"];
        $keuangan = ["kontak", "pembelian", "penjualan", "produksi", "laporan_keuangan"];
        $pengaturan = ["users","data_peternak"];
        $master = ['kandang','treatment','produk'];
        $users = ["users"];
        ?>

        <li class="nav-item">
            <a class="nav-link <?= $page === 'dashboard' ? "" : "collapsed" ?>" href="<?= base_url('dashboard') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <!-- Start Nav Manajemen Ternak -->
        <li class="nav-item">
            <a class="nav-link <?= in_array($page, $ternak)  ? "" : "collapsed"  ?>" data-bs-target="#manajemen-ternak" data-bs-toggle="collapse" href="#">
                <i class="bx bxl-baidu"></i><span>Manajemen Ternak</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="manajemen-ternak" class="nav-content collapse <?= in_array($page, $ternak)  ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="<?= $page === 'ternak' ? "active" : "" ?>" href="<?= base_url('ternak') ?>">
                        <i class="bi bi-circle"></i><span>Daftar Ternak</span>
                    </a>
                </li>
                <li>
                    <a class="<?= $page === 'jurnal_ternak' ? "active" : "" ?>" href="<?= base_url('jurnal_ternak') ?>">
                        <i class="bi bi-circle"></i><span>Jurnal Ternak</span>
                    </a>
                </li>
                <li>
                    <a class="<?= $page === 'silsilah_keluarga' ? "active" : "" ?>" href="<?= base_url('silsilah_keluarga') ?>">
                        <i class="bi bi-circle"></i><span>Silsilah Keluarga</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Nav Manajemen Ternak -->

        <!-- Start Nav Manajemen Kesehatan -->
        <li class="nav-item">
            <a class="nav-link <?= in_array($page, $kesehatan)  ? "" : "collapsed"  ?>" data-bs-target="#manajemen-kesehatan" data-bs-toggle="collapse" href="#">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Zm8.252-6.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
</svg></i><span>Manajemen Kesehatan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="manajemen-kesehatan" class="nav-content collapse <?= in_array($page, $kesehatan)  ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="<?= $page === 'treatment_ternak' ? "active" : "" ?>" href="<?= base_url('treatment_ternak') ?>">
                        <i class="bi bi-circle"></i><span>Treatment Ternak</span>
                    </a>
                </li>
                <li>
                    <a class="<?= $page === 'diet_ternak' ? "active" : "" ?>" href="<?= base_url('diet_ternak') ?>">
                        <i class="bi bi-circle"></i><span>Pakan Ternak</span>
                    </a>
                </li>
                <li>
                    <a class="<?= $page === 'bobot_ternak' ? "active" : "" ?>" href="<?= base_url('bobot_ternak') ?>">
                        <i class="bi bi-circle"></i><span>Bobot Ternak</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Nav Manajemen Kesehatan -->

        <!-- Start Nav Manajemen Pembiakan -->
        <li class="nav-item">
            <a class="nav-link <?= in_array($page, $pembiakan)  ? "" : "collapsed"  ?>" data-bs-target="#manajemen-pembiakan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gender-ambiguous"></i><span>Manajemen Pembiakan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="manajemen-pembiakan" class="nav-content collapse <?= in_array($page, $pembiakan)  ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="<?= $page === 'siklus_birahi' ? "active" : "" ?>" href="<?= base_url('siklus_birahi') ?>">
                        <i class="bi bi-circle"></i><span>Siklus Birahi</span>
                    </a>
                </li>
                <li>
                    <a class="<?= $page === 'matings' ? "active" : "" ?>" href="<?= base_url('matings') ?>">
                        <i class="bi bi-circle"></i><span>Perkawinan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Nav Manajemen Pembiakan -->

        <!-- Start Nav Manajemen keuangan -->
        <li class="nav-item">
            <a class="nav-link <?= in_array($page, $keuangan)  ? "" : "collapsed"  ?>" data-bs-target="#manajemen-keuangan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-coin"></i><span>Manajemen Keuangan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="manajemen-keuangan" class="nav-content collapse <?= in_array($page, $keuangan)  ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li>
            <a class="<?= $page === 'kontak' ? "active" : "" ?>" href="<?= base_url('kontak') ?>">
                        <i class="bi bi-circle"></i><span>Kontak</span>
                    </a>
                </li>
                <li>
            <a class="<?= $page === 'pembelian' ? "active" : "" ?>" href="<?= base_url('pembelian') ?>">
              <i class="bi bi-circle"></i><span>Pembelian</span>
            </a>
          </li>
          <li>
            <a class="<?= $page === 'penjualan' ? "active" : "" ?>" href="<?= base_url('penjualan') ?>">
              <i class="bi bi-circle"></i><span>Penjualan</span>
            </a>
          </li>
          <li>
            <a class="<?= $page === 'produksi' ? "active" : "" ?>" href="<?= base_url('produksi') ?>">
              <i class="bi bi-circle"></i><span>Produksi</span>
            </a>
          </li>
          <li>
                <li>
            <a class="<?= $page === 'laporan_keuangan' ? "active" : "" ?>" href="<?= base_url('laporan_keuangan') ?>">
                        <i class="bi bi-circle"></i><span>Laporan Keuangan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Nav Manajemen keuangan -->

        <!-- Start Nav Pengaturan -->
        <li class="nav-item">
            <a class="nav-link <?= in_array($page, $master)  ? "" : "collapsed"  ?>" data-bs-target="#master" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="master" class="nav-content collapse <?= in_array($page, $master)  ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="<?= $page === 'kandang' ? "active" : "" ?>" href="<?= base_url('kandang') ?>">
                        <i class="bi bi-circle"></i><span>Manajemen Kandang</span>
                    </a>
                </li>
                <li>
                    <a class="<?= $page === 'treatment' ? "active" : "" ?>" href="<?= base_url('treatment') ?>">
                        <i class="bi bi-circle"></i><span>Manajemen Treatment</span>
                    </a>
                </li>
                <li>
                    <a class="<?= $page === 'produk' ? "active" : "" ?>" href="<?= base_url('produk') ?>">
                        <i class="bi bi-circle"></i><span>Manajemen Produk</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->
        <!-- Start Nav Pengaturan -->
        <li class="nav-item">
            <a class="nav-link <?= in_array($page, $pengaturan)  ? "" : "collapsed"  ?>" data-bs-target="#pengaturan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Pengaturan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pengaturan" class="nav-content collapse <?= in_array($page, $pengaturan)  ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="<?= $page === 'users' ? "active" : "" ?>" href="<?= base_url('users') ?>">
                        <i class="bi bi-circle"></i><span>Manajemen Pengguna</span>
                    </a>
                </li>
                <li>
                    <a class="<?= $page === 'data_peternak' ? "active" : "" ?>" href="<?= base_url('data_peternak') ?>">
                    <i class="bi bi-circle"></i><span>Data Diri Peternak</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->
    </ul>
</aside>