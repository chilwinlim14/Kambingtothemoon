<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $subjudul; ?></h5>
                    <a href="<?= base_url('treatment_ternak/tambah') ?>"><button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Treatment Ternak</button></a>
                    <br><br>

                    <!-- Table with stripped rows -->
                    <div class="table-responsive pb-3" style="border: 0;">
                    <table id="treatment_ternak" class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nomor Tag</th>
                                <th scope="col">Treatment</th>
                                <th scope="col">Umur Ternak</th>
                                <th scope="col">Status</th>
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