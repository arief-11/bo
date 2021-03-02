<?php
	!$this->session->userdata('login') && redirect('login');
	$status = $this->session->userdata('status');
?>
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
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

 <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
  <!-- Theme style -->

	<!-- DatePicker -->
	<link rel="stylesheet" href="<?= base_url('assets/css/datepicker.css') ?>">


	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark border-bottom">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href=""><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<span class="nav-link" style="font-weight:600; ">Bimbingan Online STMIK Widya Pratama</span>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('login/logout') ?>">
						Logout &nbsp;<i class="fas fa-sign-out-alt"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-info elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url('dashboard') ?>" class="brand-link">
				<center><span class="brand-text font-weight-light"><strong><?= strtoupper($status) ?></strong></span></center>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets/dist/img/foto.png') ?>" class="img-circle elevation-2">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= substr($this->session->userdata('nama'), 0, 16) ?><?= strlen($this->session->userdata('nama')) > 16 ? '...' : '' ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

						<li class="nav-item">
							<a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<?php
							if ($status == 'mahasiswa') {
								$query = $this->db->query("SELECT * FROM makul ORDER BY nama")->result();
								foreach ($query as $x) {
						?>

							<li class="nav-item">
								<a href="<?= base_url('bimbingan/makul/'.$x->id_makul) ?>" class="nav-link <?= $this->uri->segment(3) == $x->id_makul ? 'active' : '' ?>">
									<i class="nav-icon fas fa-book"></i>
									<p><?= $x->nama ?></p>
								</a>
							</li>		

						<?php
								}
							} else if ($status == 'dosen') {
						?>
							<li class="nav-item">
								<a href="<?= base_url('monitoring') ?>" class="nav-link <?= $this->uri->segment(1) == 'monitoring' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-desktop"></i>
									<p>Monitoring</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('bimbingan/menunggu') ?>" class="nav-link <?= $this->uri->segment(2) == 'menunggu' ? 'active' : '' ?>">
									<i class="nav-icon far fa-circle text-primary"></i>
									<p>Menunggu</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('bimbingan/revisi') ?>" class="nav-link <?= $this->uri->segment(2) == 'revisi' ? 'active' : '' ?>">
									<i class="nav-icon far fa-circle text-danger"></i>
									<p>Revisi</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('bimbingan/acc') ?>" class="nav-link <?= $this->uri->segment(2) == 'acc' ? 'active' : '' ?>">
									<i class="nav-icon far fa-circle text-success"></i>
									<p>Acc</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('bimbingan/semua') ?>" class="nav-link <?= $this->uri->segment(2) == 'semua' ? 'active' : '' ?>">
									<i class="nav-icon far fa-circle"></i>
									<p>Semua</p>
								</a>
							</li>
							<!-- <li class="nav-item">
								<a href="<?= base_url('bimbingan/semua/'.$x->id_makul) ?>" class="nav-link <?= $this->uri->segment(3) == $x->id_makul ? 'active' : '' ?>">
									<i class="nav-icon fas fa-book"></i>
									<p><?= $x->nama ?></p>
								</a>
							</li>	 -->
							
						<?php
							} else if ($status == 'progdi') {
						?>

							<li class="nav-item">
								<a href="<?= base_url('bimbingan') ?>" class="nav-link <?= $this->uri->segment(1) == 'bimbingan' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-globe"></i>
									<p>Bimbingan</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('pembimbing') ?>" class="nav-link <?= $this->uri->segment(1) == 'pembimbing' || $this->uri->segment(1) == 'ploting' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-random"></i>
									<p>Pembimbing</p>
								</a>
							</li>

						<?php } else { ?>

							<li class="nav-item">
								<a href="<?= base_url('bimbingan') ?>" class="nav-link <?= $this->uri->segment(1) == 'bimbingan' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-globe"></i>
									<p>Bimbingan</p>
								</a>
							</li>

						<!-- 	<li class="nav-item">
								<a href="<?= base_url('pembimbing') ?>" class="nav-link <?= $this->uri->segment(1) == 'pembimbing' || $this->uri->segment(1) == 'ploting' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-random"></i>
									<p>Pembimbing</p>
								</a>
							</li> -->

							<li class="nav-item">
								<a href="<?= base_url('mahasiswa') ?>" class="nav-link <?= $this->uri->segment(1) == 'mahasiswa' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-users"></i>
									<p>Mahasiswa</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="<?= base_url('dosen') ?>" class="nav-link <?= $this->uri->segment(1) == 'dosen' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-user"></i>
									<p>Dosen</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('admin') ?>" class="nav-link <?= $this->uri->segment(1) == 'admin' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-user-check"></i>
									<p>Admin</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('makul') ?>" class="nav-link <?= $this->uri->segment(1) == 'makul' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-book"></i>
									<p>Makul</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('jurusan') ?>" class="nav-link <?= $this->uri->segment(1) == 'jurusan' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-paper-plane"></i>
									<p>Jurusan</p>
								</a>
							</li>

						<li class="nav-item">
								<a href="<?= base_url('tahun') ?>" class="nav-link <?= $this->uri->segment(1) == 'tahun' ? 'active' : '' ?>">
									<i class="nav-icon fas fa-calendar"></i>
									<p>Tahun Akademik</p>
								</a>
							</li> -

						<?php } ?>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
