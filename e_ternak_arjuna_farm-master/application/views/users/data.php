<section class="section">
    <div class="row">

        <div class="card">
            <div class="card-header mb-3">
                <h3 class="card-title p-0">Master <?= $subjudul ?></h3>
            </div>
            <div class="card-body">
                <div class="mt-2 mb-3">
                    <a class="btn btn-sm btn-success" href="<?= base_url('users/add') ?>"><i class="fa fa-plus"></i> Tambah User</a>
                    <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i> Reload</button>
                    <div class="pull-right">
                        <label for="show_me">
                            <input type="checkbox" id="show_me">
                            Tampilkan saya
                        </label>
                    </div>
                </div>
            </div>
            <div class="table-responsive px-4 pb-3" style="border: 0; font-size:14px;">
                <table id="users" class="w-100 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Tanggal Dibuat</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var user_id = '<?= $user->id ?>';
</script>

<!-- <script src="<?= base_url() ?>assets/dist/js/app/users/data.js"></script> -->