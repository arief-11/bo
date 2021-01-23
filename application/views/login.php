<?php $this->session->userdata('login') && redirect('dashboard'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Bimbingan Online STMIK Widya Pratama</title>
	<link rel="shortcut icon" href="<?= base_url('assets/dist/img/favicon.png') ?>">

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image:url(&quot;<?= base_url('assets/dist/img/bg_pattern.jpg') ?>&quot;);">
	<div class="login-box">
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg" style="font-weight:bold; font-size:20px; margin-top:5px; margin-bottom:5px;">
					BIMBINGAN ONLINE<br/>STMIK WIDYA PRATAMA
				</p>
				<form method="POST" action="<?= base_url('login/cek') ?>">
					<div class="input-group mb-3">
						<input type="text" name="username" class="form-control" placeholder="Username">
						<div class="input-group-append input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>

					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<div class="input-group-append input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>

					<div class="form-group mb-3">
						<select name="status" class="form-control">
							<option value="mahasiswa">Mahasiswa</option>
							<option value="dosen">Dosen</option>
							<option value="progdi">Kaprogdi</option>
							<option value="admin">Admin</option>
						</select>
					</div>

					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-info btn-block btn-flat swalDefaultError">
								Login &nbsp;<i class="fas fa-sign-in-alt"></i>
							</button>
						</div>
					</div>
				</form>

				<center style="font-size:13px; margin-top:28px;">
					<p>Copyright &copy; 2020 STMIK Widya Pratama</p>
				</center>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- SweetAlert2 -->
	<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

	<?php if ($x = $this->session->flashdata('pesan')) { ?>
		<script>
			$(function() {
				const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000 })
				Toast.fire({ type: 'error', title: '<?= $x ?>' })
			})
		</script>
	<?php } ?>
</body>
</html>
