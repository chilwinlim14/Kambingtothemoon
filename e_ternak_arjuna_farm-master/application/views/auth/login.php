<head>
	<style>
		body {
			font-family: poppins;
		}

		.hal-login {
			background-color: white;
			box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
			border-radius: 20px;
			margin-bottom: 50px;
			margin-top: 120px;
			padding: 50px;
		}

		.center {
			margin-left: auto;
			margin-right: auto;
		}

		.judul-login h3 {
			font-weight: bold;
			padding-bottom: 5px;
			/* border-left: 10px solid #ffc451; */
			padding-left: 10px;
		}
	</style>
</head>

<div class="login-box pt-5 hal-login">
	<!-- /.login-logo -->
	<div class="login-box-body">
		<h3 class="text-center mt-0 mb-4">
			<b>PPDB</b> Online <?php
								$tgl = date('Y');
								echo $tgl;
								?>
		</h3>
		<h4 class="text-center">Kab. Serdang Bedagai</h4>
		<hr>
		<p class="login-box-msg">Login to start session</p>

		<div id="infoMessage" class="text-center"><?php echo $message; ?></div>

		<?= form_open("auth/cek_login", array('id' => 'login')); ?>
		<div class="form-group has-feedback">
			<?= form_input($identity); ?>
			<span class="fa fa-envelope form-control-feedback"></span>
			<span class="help-block"></span>
		</div>
		<div class="form-group has-feedback">
			<?= form_input($password); ?>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="help-block"></span>
		</div>

		<div class="checkbox icheck form-group">
			<label>
				<?= form_checkbox('remember', '', FALSE, 'id="remember"'); ?> Remember Me
			</label>
		</div>
		<!-- /.col -->
		<div class="form-group">
			<?= form_submit('submit', lang('login_submit_btn'), array('id' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat')); ?>
		</div>
		<!-- /.col -->

		<?= form_close(); ?>

		<a href="<?= base_url() ?>auth/forgot_password" class="text-center"><?= lang('login_forgot_password'); ?></a>

	</div>
</div>

<script type="text/javascript">
	let base_url = '<?= base_url(); ?>';
</script>
<script src="<?= base_url() ?>assets/dist/js/app/auth/login.js"></script>