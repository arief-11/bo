<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-10">
				<h1 class="m-0 text-dark">Mahasiswa Dibimbing</h1>
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
		<div class="row">
			<div class="col-md-3">
				<div class="card card-outline card-dark">
					<div class="card-body">
						<h5>Jurusan :</h5>
						<p><?= $pembimbing->jurusan ?></p><hr/>
						<h5>Mata Kuliah :</h5>
						<p><?= $pembimbing->makul ?></p><hr/>
						<h5>Dosen :</h5>
						<p><?= $pembimbing->dosen ?></p><hr/>
						<h5>Mahasiswa Dibimbing :</h5>
						<p><?= $pembimbing->mahasiswa ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card card-outline card-info">
					<div class="card-body">
						<table id="tabel" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama</th>
									<th>NIM</th>
									<th>Nomor Hp</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php $no = 1 ?>
							<?php foreach ($data as $x) { ?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td><?= $x->nama ?></td>
									<td><?= $x->nim ?></td>
									<td><?= $x->no_hp ?></td>
									<td><?= $x->status ?></td>
									<td class="text-center">
										<button type="button" class="btn btn-info btn-sm ubah" title="Ubah"
											data-toggle="modal"
											data-target="#modalUbah"
											data-id="<?= $x->id_ploting ?>"
											data-mahasiswa="<?= $x->id_mahasiswa ?>"
											data-pembimbing="<?= $pembimbing->id_pembimbing ?>"
											data-status="<?= $x->status ?>"
										>
											<i class="fas fa-pencil-alt"></i>
										</button>
										<button type="button" class="btn btn-danger btn-sm hapus" title="Hapus"
											data-toggle="modal"
											data-target="#modalHapus"
											data-id="<?= $x->id_ploting ?>"
											data-pembimbing="<?= $pembimbing->id_pembimbing ?>"
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
	</div>
</div>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="<?= base_url('ploting/tambah/'.$pembimbing->id_pembimbing) ?>">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Mahasiswa</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Mahasiswa</label>
					<select name="mahasiswa" class="form-control select2" style="width: 100%;">
						<?php foreach ($mahasiswa as $x) { ?>
							<option value="<?= $x->id_mahasiswa ?>"><?= $x->nim.' - '.$x->nama ?></option>
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
				<h4 class="modal-title">Ubah Mahasiswa</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Mahasiswa</label>
					<select name="mahasiswa" class="form-control" id="mahasiswa">
						<?php foreach ($mahasiswa as $x) { ?>
							<option value="<?= $x->id_mahasiswa ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
					<select name="status" class="form-control" id="status">
						<option><?= $x->status ?></option>
					</select>
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</form>
	</div>
</div>
