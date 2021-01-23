<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-10">
				<h1 class="m-0 text-dark">Pembimbing</h1>
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
							<th>Jurusan</th>
							<th>Mata Kuliah</th>
							<th>Dosen</th>
							<th>Mahasiswa Dibimbing</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1 ?>
					<?php foreach ($data as $x) { ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $x->jurusan ?></td>
							<td><?= $x->makul ?></td>
							<td><?= $x->dosen ?></td>
							<td align="center"><?= $x->mahasiswa ?></td>
							<td class="text-center">
								<a href="<?= base_url('ploting/data/'.$x->id_pembimbing) ?>" class="btn btn-warning btn-sm" title="Lihat Mahasiswa">
									<i class="fas fa-users"></i>
								</a>
								<button type="button" class="btn btn-info btn-sm ubah" title="Ubah"
									data-toggle="modal"
									data-target="#modalUbah"
									data-id="<?= $x->id_pembimbing ?>"
									data-jurusan="<?= $x->id_jurusan ?>"
									data-makul="<?= $x->id_makul ?>"
									data-dosen="<?= $x->id_dosen ?>"
								>
									<i class="fas fa-pencil-alt"></i>
								</button>
								<button type="button" class="btn btn-danger btn-sm hapus" title="Hapus"
									data-toggle="modal"
									data-target="#modalHapus"
									data-id="<?= $x->id_pembimbing ?>"
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
		<form class="modal-content" method="POST" action="<?= base_url('pembimbing/tambah') ?>">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Pembimbing</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Jurusan</label>
					<select name="jurusan" class="form-control">
						<?php foreach ($jurusan as $x) { ?>
							<option value="<?= $x->id_jurusan ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Mata Kuliah</label>
					<select name="makul" class="form-control">
						<?php foreach ($makul as $x) { ?>
							<option value="<?= $x->id_makul ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Dosen</label>
					<select name="dosen" class="form-control">
						<?php foreach ($dosen as $x) { ?>
							<option value="<?= $x->id_dosen ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
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
				<h4 class="modal-title">Ubah Pembimbing</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Jurusan</label>
					<select name="jurusan" class="form-control" id="jurusan">
						<?php foreach ($jurusan as $x) { ?>
							<option value="<?= $x->id_jurusan ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Mata Kuliah</label>
					<select name="makul" class="form-control" id="makul">
						<?php foreach ($makul as $x) { ?>
							<option value="<?= $x->id_makul ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Dosen</label>
					<select name="dosen" class="form-control" id="dosen">
						<?php foreach ($dosen as $x) { ?>
							<option value="<?= $x->id_dosen ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</form>
	</div>
</div>
