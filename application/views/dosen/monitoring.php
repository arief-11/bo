<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-md-10">
				<h1 class="m-0 text-dark">Monitoring</h1>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container-fluid">

		<?php
			$id = $this->session->userdata('id');
			foreach ($data as $z) {
				$makul = $z->id_makul;
				$query = $this->db->query("SELECT *, mahasiswa.nama mahasiswa FROM ploting JOIN mahasiswa ON ploting.id_mahasiswa = mahasiswa.id_mahasiswa JOIN pembimbing ON ploting.id_pembimbing = pembimbing.id_pembimbing WHERE id_makul = '$makul' && id_dosen = '$id' ORDER BY mahasiswa.nama")->result();
				$data2 = [];

				foreach ($query as $y) {
					$id_mahasiswa = $y->id_mahasiswa;
					$query2 = $this->db->query("SELECT * FROM bimbingan WHERE id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' && id_makul = '$makul' && status IS NOT NULL ORDER BY id_bimbingan DESC")->row();

					$b['mahasiswa'] = $y->mahasiswa;
					$b['bab'] = $query2 ? $query2->bab : null;
					$b['status'] = $query2 ? $query2->status : null;

					array_push($data2, (object) $b);
				}
		?>
			<div class="card card-outline card-info">
				<div class="card-header">
					<h5><?= $z->nama ?></h5>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th rowspan="2" class="align-middle">No.</th>
								<th rowspan="2" class="align-middle">Mahasiswa</th>
								<th colspan="5" class="text-center">Laporan Bab</th>
							</tr>
							<tr>
								<th class="no-content">1</th>
								<th>2</th>
								<th>3</th>
								<th>4</th>
								<th>5</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1 ?>
						<?php foreach ($data2 as $x) { ?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td><?= $x->mahasiswa ?></td>
								<td>
									<?php
										if ($x->bab == 'Bab I') {
											echo $x->status == '1' ? "<span class='text-danger'>Revisi</span>" : "<span class='text-success'>Acc</span>";
										} else if ($x->bab == 'Bab II' || $x->bab == 'Bab III' || $x->bab == 'Bab IV' || $x->bab == 'Bab V') {
											echo "<span class='text-success'>Acc</span>";
										} else {
											echo "Proses";
										}
									?>
								</td>
								<td>
									<?php
										if ($z->bab_maks < 2) {
											echo '-';
										} else {
											if ($x->bab == 'Bab II') {
												echo $x->status == '1' ? "<span class='text-danger'>Revisi</span>" : "<span class='text-success'>Acc</span>";
											} else if ($x->bab == 'Bab I') {
												echo "Proses";
											} else if ($x->bab == 'Bab III' || $x->bab == 'Bab IV' || $x->bab == 'Bab V') {
												echo "<span class='text-success'>Acc</span>";
											} else {
												echo "Proses";
											}
										}
									?>
								</td>
								<td>
									<?php
										if ($z->bab_maks < 3) {
											echo '-';
										} else {
											if ($x->bab == 'Bab III') {
												echo $x->status == '1' ? "<span class='text-danger'>Revisi</span>" : "<span class='text-success'>Acc</span>";
											} else if ($x->bab == 'Bab I' || $x->bab == 'Bab II') {
												echo "Proses";
											} else if ($x->bab == 'Bab IV' || $x->bab == 'Bab V') {
												echo "<span class='text-success'>Acc</span>";
											} else {
												echo "Proses";
											}
										}
									?>
								</td>
								<td>
									<?php
										if ($z->bab_maks < 4) {
											echo '-';
										} else {
											if ($x->bab == 'Bab IV') {
												echo $x->status == '1' ? "<span class='text-danger'>Revisi</span>" : "<span class='text-success'>Acc</span>";
											} else if ($x->bab == 'Bab I' || $x->bab == 'Bab II' || $x->bab == 'Bab III') {
												echo "Proses";
											} else if ($x->bab == 'Bab V') {
												echo "<span class='text-success'>Acc</span>";
											} else {
												echo "Proses";
											}
										}	
									?>
								</td>
								<td>
									<?php
										if ($z->bab_maks < 5) {
											echo '-';
										} else {
											if ($x->bab == 'Bab V') {
												echo $x->status == '1' ? "<span class='text-danger'>Revisi</span>" : "<span class='text-success'>Acc</span>";
											} else if ($x->bab == 'Bab I' || $x->bab == 'Bab II' || $x->bab == 'Bab III' || $x->bab == 'Bab IV') {
												echo "Proses";
											} else {
												echo "Proses";
											}
										}
									?>
								</td>
							</tr>
						<?php } ?>
						<?php if (!$data2) { ?>
							<tr>
								<td colspan="8" class ="text-center"><br/>Belum Ada Data<br/><br/></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		<?php } ?>

	</div>
</div>
