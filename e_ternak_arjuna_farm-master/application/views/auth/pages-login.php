<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="<?= base_url() ?>assets2/img/logo.png" alt="">
            <span class="d-none d-lg-block">E-TERNAK</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Masuk ke Akun Anda</h5>
              <p class="text-center small">Masukkan username & password Anda</p>
            </div>

            <div id="infoMessage" class="text-center"><?php echo $message; ?></div>


            <!-- <form class="row g-3 needs-validation" novalidate> -->
            <?= form_open("auth/cek_login", array('id' => 'login', 'class' => 'row g-3')); ?>

            <div class="col-12">
              <label for="yourEmail" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope"></i></span>
                <?= form_input($identity); ?>
                <div class="invalid-feedback">Silakan masukkan Email Anda!</div>
              </div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label">Password</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock"></i></span>
                <?= form_input($password); ?>
                <div class="invalid-feedback">Silakan masukkan password Anda!</div>
              </div>
            </div>

            <div class="col-12">
              <div class="checkbox icheck form-group">
                <label>
                  <?= form_checkbox('remember', '', FALSE, 'id="remember"'); ?> &nbsp;Remember me
                </label>
              </div>
            </div>
            <div class="col-12">
              <!-- <button class="btn btn-primary w-100" type="submit">Masuk</button> -->
              <?= form_submit('submit', lang('login_submit_btn'), array('id' => 'submit', 'class' => 'btn btn-primary w-100')); ?>
            </div>
            </form>

            <div class="col-12 mt-3">
              <p class="small mb-0">Tidak punya akun? Mohon hubungi admin.</p>
            </div>

          </div>
        </div>

        <div class="credits">
          &copy; Copyright <strong><span>E-TERNAK</span></strong>. All Rights Reserved
        </div>

      </div>
    </div>
  </div>

</section>

<script type="text/javascript">
  let base_url = '<?= base_url(); ?>';
</script>
<script src="<?= base_url() ?>assets/dist/js/app/auth/login.js"></script>