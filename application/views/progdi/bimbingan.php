<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col">
				<h1 class="m-0 text-dark">Bimbingan</h1>
			</div>
			<div class="row">	
<!-- 
			<a href="<?= base_url('bimbingan/tabel') ?>" style="margin-bottom: 7px;" class="btn btn-secondary"><i class="fa fa-print"> <b>CETAK
                                     LAPORAN</b></i></a> -->
			</div>
			<div class="col-md-3">
				<select class="form-control" id="pilihmakul">
					<option value="0">-- Pilih Makul --</option>
					<?php 
						 $query11 = $this->db->query("SELECT * FROM makul")->result();

						 foreach ($query11 as $key => $qr) {
						 	
						 ?>

						 <option value="<?= $qr->id_makul ?>"><?= $qr->nama ?></option>

					<?php } ?>
				</select>
			</div>
			<div class="col-md-3">
				<select class="form-control" id="pilihbab">
					<option value="0">-- Pilih Bab --</option>
					<option value="I">Acc Bab I</option>
					<option value="II">Acc Bab II</option>
					<option value="III">Acc Bab III</option>
					<option value="IV">Acc Bab IV</option>
					<option value="V">Acc Bab V</option>
				</select>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container-fluid">
		<div class="card card-outline card-info">
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nim</th>
							<th>Dosen</th>
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
					<tbody id="tbl">
					<?php $no = 1 ?>
					<?php foreach ($data as $x) { ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td><?= $x->nim ?></td>
							<td><?= $x->dosen ?></td>
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

<!-- Script -->