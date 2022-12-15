<section class="section">
    <div class="row">
        <?php if ($this->ion_auth->is_admin()) : ?>
            <div class="col-sm-12 mb-4">
                <a href="<?= base_url('users') ?>" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Batal
                </a>
            </div>
            <div class="col-sm-8">
                <?= form_open('users/save', array('id' => 'add_user')) ?>
                <div class="card">
                    <div class="card-header mb-3">
                        <h3 class="card-title p-0"><?= $subjudul; ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7 col-sm-offset-2">
                                <div class="form-group">
                                    <label for="identity">Username</label>
                                    <input type="text" name="identity" class="form-control">
                                    <small class="help-block"></small>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" class="form-control">
                                        <small class="help-block"></small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control">
                                        <small class="help-block"></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" placeholder="Password Baru" name="password" class="form-control">
                                    <small class="help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input type="password" placeholder="Konfirmasi Password" name="password2" class="form-control">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="btn-info" class="btn btn-info">Simpan</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script src="<?= base_url() ?>assets/dist/js/app/users/add.js"></script>