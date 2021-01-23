<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-12">
				<h1 class="m-0 text-dark">Bimbingan</h1>
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
							<th>Makul</th>
							<th>Bab</th>
							<th>Deskripsi</th>
							<th>Catatan Dosbing</th>
							<th>Status</th>
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
										<button class="dropdown-item hapus"
											data-toggle="modal"
											data-target="#modalHapus"
											data-id="<?= $x->id_bimbingan ?>"
										>
											Hapus
										</button>
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
