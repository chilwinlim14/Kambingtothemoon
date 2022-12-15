<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Pakan Ternak</h5>
                    <ul class="nav nav-tabs nav-tabs-bordered" id="metodePenambahan" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="penambahan-manual-tab" data-bs-toggle="tab" data-bs-target="#penambahan-manual" type="button" role="tab" aria-controls="penambahan-manual" aria-selected="true">Penambahan Manual</button>
                        </li>
                        <li class="nav-item" role="penambahan-otomatis-tab">
                            <button class="nav-link" id="penambahan-otomatis-tab" data-bs-toggle="tab" data-bs-target="#penambahan-otomatis" type="button" role="tab" aria-controls="penambahan-otomatis" aria-selected="false">Penambahan Otomatis</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="isiMetodePenambahan">
                        <!-- Tambah Diet Ternak Manual -->
                        <div class="tab-pane fade show active" id="penambahan-manual" role="tabpanel" aria-labelledby="penambahan-manual"><br>
                            <?= form_open('diet_ternak/save', array('id' => 'tambah_diet_ternak', 'class' => 'row g-3'), array('method' => 'add')) ?>
                            <!-- <form class="row g-3"> -->
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <select class="form-select" name="hari" aria-label="Pilih Hari">
                                    <option value="Setiap Hari" selected>Setiap Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="waktu_pemberian">Waktu</label>
                                <input type="text" name="waktu_pemberian" class="form-control" id="datetimepicker3">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="kandang">Kandang</label>
                                <select name="kandang" class="select_box" style="width: 100%!important" data-live-search="true">
                                <option value="">Pilih Kandang</option>
                                <?php foreach ($kandang as $row) : ?>
                                    <option value="<?= $row->id_kandang ?>"><?= $row->nama_kandang ?> - Blok <?= $row->blok ?></option>
                                <?php endforeach; ?>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="pakan">Pakan</label>
                                <textarea name="pakan" class="form-control"></textarea>
                                <small class="help-block"></small>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('diet_ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                            </div>
                            <?= form_close(); ?>
                        </div>
                        <!-- Tambah Diet Ternak Ototmatis -->
                        <div class="tab-pane fade" id="penambahan-otomatis" role="tabpanel" aria-labelledby="penambahan-otomatis"><br>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label for="pilihanHari" class="form-label">Pilihan Hari</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="senin">
                                        <label class="form-check-label" for="senin">
                                            Senin
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selasa">
                                        <label class="form-check-label" for="selasa">
                                            Selasa
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rabu">
                                        <label class="form-check-label" for="rabu">
                                            Rabu
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="kamis">
                                        <label class="form-check-label" for="kamis">
                                            Kamis
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="jumat">
                                        <label class="form-check-label" for="jumat">
                                            Jumat
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sabtu">
                                        <label class="form-check-label" for="sabtu">
                                            Sabtu
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="minggu">
                                        <label class="form-check-label" for="minggu">
                                            Minggu
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputWaktu" class="form-label">Waktu</label>
                                    <input type="time" class="form-control" id="inputWaktu">
                                </div>
                                <div class="col-12">
                                    <label for="inputKandang" class="form-label">Kandang</label>
                                    <input type="text" class="form-control" id="inputKandang">
                                </div>
                                <div class="col-12">
                                    <label for="inputPakan" class="form-label">Pakan</label>
                                    <input type="text" class="form-control" id="inputPakan">
                                </div>

                                <div class="text-center">
                                    <a href="<?= base_url('diet_ternak') ?>"><button type="button" class="btn btn-primary">Simpan</button></a>
                                    <a href="<?= base_url('diet_ternak') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>