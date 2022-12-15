    <section class="section">

          <!-- Tambah Penjualan -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Tambah Penjualan</h5>
  
                    <!-- Tambah Penjualan Form Elements -->
                    <?= form_open('penjualan/save', array('id' => 'tambah_penjualan', 'class' => 'row g-3'), array('method' => 'add')) ?>
                            <!-- <form class="row g-3"> -->
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="id_ternak">Nomor Tag</label>
                                <select name="id_ternak" class="select_box" style="width: 100%!important" data-live-search="true">
                                <?php foreach ($data_ternak as $row) : ?>
                                  <option value="<?= $row->id_ternak ?>"><?= $row->nomor_tag ?> - <?= $row->inisial ?></option>
                                <?php endforeach; ?>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="pembeli">Pembeli</label>
                                <select name="pembeli" class="select_box2" style="width: 100%!important" data-live-search="true">
                                <?php foreach ($data_kontak as $row) : ?>
                                  <option value="<?= $row->id_kontak ?>"><?= $row->nama ?></option>
                                <?php endforeach; ?>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="deposit">Deposit</label>
                                <input type="text" name="deposit" class="form-control">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="utang">Utang</label>
                                <input type="text" name="utang" class="form-control">
                                <small class="help-block"></small>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control">
                                <small class="help-block"></small>
                            </div>
                    
                            <div class="text-center">
                                <button type="submit" id="btn-info" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('penjualan') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                            </div>
                            <?= form_close(); ?>
              </div>
            </div>

      </section>