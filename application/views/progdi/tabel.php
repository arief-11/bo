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
<div class="content">
	<div class="container-fluid">
		<div class="card card-outline card-info">
			<div class="card-body">
				<table id="tabel" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Tanggal</th>
							<th>Mahasiswa</th>
							<th>Makul</th>
							<th>Bab</th>
							<th>Deskripsi</th>
							<th>Catatan Dosbing</th>
							<th>Status</th>
							
						</tr>
					</thead>
					<tbody>
					<?php $no = 1 ?>
					<?php foreach ($data as $x) { ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $x->tanggal ?></td>
							<td><?= $x->mahasiswa ?></td>
							<td><?= $x->makul ?></td>
							<td><?= $x->bab ?></td>
							<td><?= $x->deskripsi ? $x->deskripsi : '-' ?></td>
							<td><?= $x->catatan ? $x->catatan : '-' ?></td>
							<td style="font-weight: 600;">
								<?php
									if ($x->status == 1) { echo "<span class='text-danger'>Revisi</span>"; }
									else if ($x->status == 2) { echo "<span class='text-success'>Acc</span>"; }
									else { echo "<span class='text-primary'>Menunggu</span>"; }
								?>
							</td>
							
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
window.print()

</script>