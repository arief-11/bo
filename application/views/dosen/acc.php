<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-12">
				<h1 class="m-0 text-dark">Bimbingan Acc</h1>
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
							<th>Tanggal</th>
							<th>Mahasiswa</th>
							<th>Jurusan</th>
							<th>Bab</th>
							<th>Deskripsi</th>
							<th>Catatan Dosbing</th>
							<th>Status</th>
							<th>Tahun Ajaran</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1 ?>
					<?php foreach ($data as $x) { ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $x->tanggal ?></td>
							<td><?= $x->mahasiswa ?></td>
							<td><?= $x->singkatan ?></td>
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
							<td><?= $x->tahun ?></td>
							<td class="text-center">
								<div class="btn-group">
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
										Opsi <span class="caret"></span>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?= base_url('file/'.$x->file) ?>">
											Berkas Bimbingan
										</a>
										<?php if ($x->file2) { ?>
											<a class="dropdown-item" href="<?= base_url('file/'.$x->file2) ?>">
												Berkas Revisi
											</a>
										<?php } ?>
										<?php if (!$x->status) { ?>
											<button class="dropdown-item revisi"
												data-toggle="modal"
												data-target="#modalRevisi"
												data-id="<?= $x->id_bimbingan ?>"
											>
												Revisi
											</button>
											<button class="dropdown-item acc"
												data-toggle="modal"
												data-target="#modalAcc"
												data-id="<?= $x->id_bimbingan ?>"
											>
												Acc
											</button>
										<?php } ?>
										<?php if ($x->status == 1) { ?>
											<button class="dropdown-item batalrevisi"
												data-toggle="modal"
												data-target="#modalBatal"
												data-id="<?= $x->id_bimbingan ?>"
											>
												Batal Revisi
											</button>
										<?php } ?>
										<?php if ($x->status == 2) { ?>
											<button class="dropdown-item batalacc"
												data-toggle="modal"
												data-target="#modalBatal2"
												data-id="<?= $x->id_bimbingan ?>"
											>
												Batal Acc
											</button>
										<?php } ?>
										<a class="dropdown-item" href="<?= base_url('riwayat/bimbingan/'.$x->id_bimbingan) ?>">
											Riwayat Bimbingan
										</a>
									</div>
								</div>	
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalRevisi">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" enctype="multipart/form-data">
			<div class="modal-header">
				<h4 class="modal-title">Revisi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Catatan</label>
					<textarea class="form-control" name="catatan" rows="3" placeholder="Catatan..." required></textarea>
				</div>
				<div class="form-group">
					<label>Berkas Revisi <em style="font-weight: 400;">(Jika ada)</em></label>
					<input type="file" class="form-control" name="file">
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Kirim</button>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalAcc">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" enctype="multipart/form-data">
			<div class="modal-header">
				<h4 class="modal-title">Acc</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Catatan</label>
					<textarea class="form-control" name="catatan" rows="3" placeholder="Catatan..." required></textarea>
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Kirim</button>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalBatal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Batal Revisi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Anda yakin ingin membatalkan ?</p>
			</div>
			<div class="modal-footer text-right">
				<a class="btn btn-info" id="batal">Ya, batalkan !</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalBatal2">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Batal Acc</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Anda yakin ingin membatalkan ?</p>
			</div>
			<div class="modal-footer text-right">
				<a class="btn btn-info" id="batal2">Ya, batalkan !</a>
			</div>
		</div>
	</div>
</div>`
