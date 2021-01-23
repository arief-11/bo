<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-10">
				<h1 class="m-0 text-dark">Tahun Ajaran</h1>
			</div>
			<div class="col-md-2 text-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
					<i class="fas fa-plus-circle"></i> &nbsp;Tambah
				</button>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container-fluid">
		<div class="card card-outline card-info">
			<div class="card-body">
				<table id="tabel" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Tahun Ajaran</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1 ?>
					<?php foreach ($data as $x) { ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $x->tahun ?></td>
							<td style="font-weight: 600;">
								<?php
									if ($x->status == 1) { echo "<span class='text-success'>Aktif</span>"; }
								?>
							</td>
							<td class="text-center">
								<button type="button" class="btn btn-success btn-sm aktif" title="Aktifkan"
									data-toggle="modal"
									data-target="#modalAktif"
									data-id="<?= $x->id_tahun ?>"
								>
									<i class="fas fa-check"></i>
								</button>
								<button type="button" class="btn btn-info btn-sm ubah" title="Ubah"
									data-toggle="modal"
									data-target="#modalUbah"
									data-id="<?= $x->id_tahun ?>"
									data-tahun="<?= $x->tahun ?>"
								>
									<i class="fas fa-pencil-alt"></i>
								</button>
								<button type="button" class="btn btn-danger btn-sm hapus" title="Hapus"
									data-toggle="modal"
									data-target="#modalHapus"
									data-id="<?= $x->id_tahun ?>"
								>
									<i class="fas fa-trash"></i>
								</button>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="<?= base_url('tahun/tambah') ?>">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Tahun Ajaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Tahun Ajaran</label>
					<input type="text" name="tahun" class="form-control" placeholder="Tahun Ajaran..." required>
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalUbah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Tahun Ajaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Tahun Ajaran</label>
					<input type="text" name="tahun" class="form-control" placeholder="Tahun Ajaran..." id="tahun" required>
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalAktif">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Aktifkan Tahun Ajaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Anda yakin ingin mengaktifkan ?</p>
			</div>
			<div class="modal-footer text-right">
				<a class="btn btn-info" id="aktif">Ya, aktifkan !</a>
			</div>
		</div>
	</div>
</div>
