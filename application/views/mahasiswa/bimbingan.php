<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-10">
				<h1 class="m-0 text-dark"><?= $makul->nama ?></h1>
			</div>
			<?php if ($dosbing) { ?>
				<div class="col-md-2 text-right">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
						<i class="fas fa-plus-circle"></i> &nbsp;tambah
					</button>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="content">
	<div class="container-fluid">
		<div class="card card-outline card-info">
			<div class="card-body">
				<?php if ($dosbing) { ?>
					<table id="tabel" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tanggal</th>
								<th>Bab</th>
								<th>Deskripsi</th>
								<th>Dosbing</th>
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
								<td><?= $x->bab ?></td>
								<td><?= $x->deskripsi ? $x->deskripsi : '-' ?></td>
								<td><?= $dosbing ?></td>
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
												<button class="dropdown-item hapus"
													data-toggle="modal"
													data-target="#modalHapus"
													data-id="<?= $x->id_bimbingan ?>"
													data-makul="<?= $makul->id_makul ?>"
												>
													Hapus
												</button>
											<?php } ?>
										</div>
	                        		</div>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				<?php } else { ?>
					<center><br/><h5>Anda belum mendapat dosen pembimbing.</h5><br/></center>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="<?= base_url('bimbingan/tambah/'.$makul->id_makul) ?>" enctype="multipart/form-data">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Bimbingan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Dosbing</label>
					<input type="text" class="form-control" value="<?= $dosbing ?>" disabled>
				</div>
				<div class="form-group">
					<label>Berkas</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<div class="form-group">
					<label>Bab</label>
					<select name="bab" class="form-control">
						<?php
							if ($makul->bab_maks == 1) {
								echo "<option>Bab I</option>";
							} else if ($makul->bab_maks == 2) {
								echo "<option>Bab I</option>";
								echo "<option>Bab II</option>";
							} else if ($makul->bab_maks == 3) {
								echo "<option>Bab I</option>";
								echo "<option>Bab II</option>";
								echo "<option>Bab III</option>";
							} else if ($makul->bab_maks == 4) {
								echo "<option>Bab I</option>";
								echo "<option>Bab II</option>";
								echo "<option>Bab III</option>";
								echo "<option>Bab IV</option>";
							} else if ($makul->bab_maks == 5) {
								echo "<option>Bab I</option>";
								echo "<option>Bab II</option>";
								echo "<option>Bab III</option>";
								echo "<option>Bab IV</option>";
								echo "<option>Bab V</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi..."></textarea>
				</div>
				<div class="form-group">
					<label>Tahun Ajaran & Semester</label>
					<input type="text" class="form-control" name="tahun" value="<?= $tahun ?>">
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Kirim</button>
			</div>
		</form>
	</div>
</div>
