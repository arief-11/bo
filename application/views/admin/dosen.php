<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-10">
				<h1 class="m-0 text-dark">Dosen</h1>
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
							<th>Nama</th>
							<th>Alamat</th>
							<th>Nomor Hp</th>
							<th>Username</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1 ?>
					<?php foreach ($data as $x) { ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $x->nama ?></td>
							<td><?= $x->alamat ?></td>
							<td><?= $x->no_hp ?></td>
							<td><?= $x->username ?></td>
							<td class="text-center">
								<button type="button" class="btn btn-info btn-sm ubah" title="Ubah"
									data-toggle="modal"
									data-target="#modalUbah"
									data-id="<?= $x->id_dosen ?>"
									data-nama="<?= $x->nama ?>"
									data-alamat="<?= $x->alamat ?>"
									data-no_hp="<?= $x->no_hp ?>"
									data-username="<?= $x->username ?>"
								>
									<i class="fas fa-pencil-alt"></i>
								</button>
								<button type="button" class="btn btn-danger btn-sm hapus" title="Hapus"
									data-toggle="modal"
									data-target="#modalHapus"
									data-id="<?= $x->id_dosen ?>"
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
		<form class="modal-content" method="POST" action="<?= base_url('dosen/tambah') ?>">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Dosen</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama..." required>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" placeholder="Alamat..." required>
				</div>
				<div class="form-group">
					<label>Nomor Hp</label>
					<input type="text" name="no_hp" class="form-control" placeholder="Nomor Hp..." required>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="Username..." required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" name="password" class="form-control" placeholder="Password..." required>
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
				<h4 class="modal-title">Ubah Dosen</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama..." id="nama" required>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" placeholder="Alamat..." id="alamat" required>
				</div>
				<div class="form-group">
					<label>Nomor Hp</label>
					<input type="text" name="no_hp" class="form-control" placeholder="Nomor Hp..." id="no_hp" required>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="Username..." id="username" required>
				</div>
				<div class="form-group">
					<label>Password <em style="font-weight: 400;">(Kosongi jika tidak diubah)</em></label>
					<input type="text" name="password" class="form-control" placeholder="Password...">
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</form>
	</div>
</div>
