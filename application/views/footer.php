		</div>

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- Default to the left -->
			<strong>Copyright &copy; 2020 STMIK Widya Pratama.</strong> All rights reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<div class="modal fade" id="modalHapus">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Hapus</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Anda yakin ingin menghapus ?</p>
				</div>
				<div class="modal-footer text-right">
					<a class="btn btn-info" id="hapus">Ya, hapus !</a>
				</div>
			</div>
		</div>
	</div>

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- SweetAlert2 -->
	<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
	<!-- DataTables -->
	<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>







	<!-- DataPicker -->
	<script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/datepicker.js') ?>"></script>
	<!-- ChartJS -->
	<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
	<!-- Select2 -->
	<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>

	<script>
		$(function () {
			$('#tabel').DataTable()
			$('#tabel2').DataTable({ 'columnDefs': [{ 'orderable': false, 'targets': [2, 3, 4, 5, 6] }] })
			 //Initialize Select2 Elements
			 $('.select2').select2()

		    //Initialize Select2 Elements
		    $('.select2bs4').select2({
		    	theme: 'bootstrap4'
		    })
		})

		$(document).on('click', '#kembali', function () {
			window.history.back()
		})

		<?php if ($x = $this->session->flashdata('success')) { ?>

			$(function() {
				const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000 })
				Toast.fire({ type: 'success', title: '<?= $x ?>' })
			})

		<?php } else if ($x = $this->session->flashdata('error')) { ?>

			$(function() {
				const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000 })
				Toast.fire({ type: 'error', title: '<?= $x ?>' })
			})
			
		<?php } ?>

		<?php if (isset($menu)) { ?>
			<?php if ($menu == 'mahasiswa') { ?>

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var nama = $(this).data('nama')
					var nim = $(this).data('nim')
					var alamat = $(this).data('alamat')
					var no_hp = $(this).data('no_hp')
					var jurusan = $(this).data('jurusan')
					var url = "<?= base_url('mahasiswa/ubah/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
					$('#nama').val(nama)
					$('#nim').val(nim)
					$('#alamat').val(alamat)
					$('#no_hp').val(no_hp)
					$('#jurusan').val(jurusan)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('mahasiswa/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'dosen') { ?>

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var nama = $(this).data('nama')
					var alamat = $(this).data('alamat')
					var no_hp = $(this).data('no_hp')
					var username = $(this).data('username')
					var url = "<?= base_url('dosen/ubah/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
					$('#nama').val(nama)
					$('#alamat').val(alamat)
					$('#no_hp').val(no_hp)
					$('#username').val(username)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('dosen/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'admin') { ?>

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var nama = $(this).data('nama')
					var username = $(this).data('username')
					var url = "<?= base_url('admin/ubah/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
					$('#nama').val(nama)
					$('#username').val(username)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('admin/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'makul') { ?>

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var nama = $(this).data('nama')
					var bab = $(this).data('bab')
					var url = "<?= base_url('makul/ubah/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
					$('#nama').val(nama)
					$('#bab').val(bab)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('makul/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'jurusan') { ?>

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var nama = $(this).data('nama')
					var singkatan = $(this).data('singkatan')
					var dosen = $(this).data('dosen')
					var url = "<?= base_url('jurusan/ubah/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
					$('#nama').val(nama)
					$('#singkatan').val(singkatan)
					$('#dosen').val(dosen)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('jurusan/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'pembimbing') { ?>

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var jurusan = $(this).data('jurusan')
					var makul = $(this).data('makul')
					var dosen = $(this).data('dosen')
					var url = "<?= base_url('pembimbing/ubah/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
					$('#jurusan').val(jurusan)
					$('#makul').val(makul)
					$('#dosen').val(dosen)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('pembimbing/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'pembimbing2') { ?>

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var makul = $(this).data('makul')
					var dosen = $(this).data('dosen')
					var url = "<?= base_url('pembimbing/ubah/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
					$('#makul').val(makul)
					$('#dosen').val(dosen)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('pembimbing/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})
				
			<?php } else if ($menu == 'bimbingan') { ?>

				$(document).on('click', '.revisi', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('bimbingan/revisi2/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
				})

				$(document).on('click', '.acc', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('bimbingan/acc2/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
				})

				$(document).on('click', '.batalrevisi', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('bimbingan/batalrevisi/:id') ?>"
					url = url.replace(':id', id)
					$('#batal').attr('href', url)
				})

				$(document).on('click', '.batalacc', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('bimbingan/batalacc/:id') ?>"
					url = url.replace(':id', id)
					$('#batal').attr('href', url)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var makul = $(this).data('makul')
					var url = "<?= base_url('bimbingan/hapus/:id/:makul') ?>"
					url = url.replace(':id', id)
					url = url.replace(':makul', makul)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'bimbingan2') { ?>

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('bimbingan/hapus2/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				}) 

				$(document).on('change', '#pilihbab', function () {
					var bab = $(this).val()
					var makul = $('#pilihmakul').val();

					if (bab != 0 || makul !=0) {
						$.ajax({
							url : "<?php echo base_url('bimbingan/bab/') ?>"+bab+'/'+makul,
							method :'POST',
							success:function(data){

								$('#tbl').html(data);
							}
						})

					}else if(bab != 0 || makul ==0){
						$.ajax({
							url : "<?php echo base_url('bimbingan/bab/') ?>"+bab+'/'+makul,
							method :'POST',
							success:function(data){

								$('#tbl').html(data);
							}
						})
					}
				})

				$(document).on('change', '#pilihmakul', function () {
					var makul = $(this).val()
					var bab = $('#pilihbab').val();

					if (bab == 0 || makul !=0) {
						
						$.ajax({

							url : "<?php echo base_url('bimbingan/bab/') ?>"+bab+'/'+makul,
							method :'POST',
							success:function(data){

								$('#tbl').html(data);
							}
						})

					}
				})


			<?php } else if ($menu == 'semua') { ?>

				$(document).on('click', '.revisi', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('semua/revisi/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
				})

				$(document).on('click', '.acc', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('semua/acc/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
				})

				$(document).on('click', '.batalrevisi', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('semua/batalrevisi/:id') ?>"
					url = url.replace(':id', id)
					$('#batal').attr('href', url)
				})

				$(document).on('click', '.batalacc', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('semua/batalacc/:id') ?>"
					url = url.replace(':id', id)
					$('#batal2').attr('href', url)
				})

			<?php } else if ($menu == 'dashboard') { ?>

				$(document).on('click', '.revisi', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('dashboard/revisi/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
				})

				$(document).on('click', '.acc', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('dashboard/acc/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
				})

				$(document).on('click', '.batalrevisi', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('dashboard/batalrevisi/:id') ?>"
					url = url.replace(':id', id)
					$('#batal').attr('href', url)
				})

				$(document).on('click', '.batalacc', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('dashboard/batalacc/:id') ?>"
					url = url.replace(':id', id)
					$('#batal2').attr('href', url)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('dashboard/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'ploting') { ?>

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var mahasiswa = $(this).data('mahasiswa')
					var pembimbing = $(this).data('pembimbing')
					var status = $(this).data('status')
					var url = "<?= base_url('ploting/ubah/:id/:pembimbing') ?>"
					url = url.replace(':id', id)
					url = url.replace(':pembimbing', pembimbing)
					$('form').attr('action', url)
					$('#mahasiswa').val(mahasiswa)
					$('#status').val(status)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var pembimbing = $(this).data('pembimbing')
					var url = "<?= base_url('ploting/hapus/:id/:pembimbing') ?>"
					url = url.replace(':id', id)
					url = url.replace(':pembimbing', pembimbing)
					$('#hapus').attr('href', url)
				})

			<?php } else if ($menu == 'riwayat') { ?>

				$(document).on('click', '.revisi', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('riwayat/revisi/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
				})

				$(document).on('click', '.acc', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('riwayat/acc/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
				})

				$(document).on('click', '.batalrevisi', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('riwayat/batalrevisi/:id') ?>"
					url = url.replace(':id', id)
					$('#batal').attr('href', url)
				})

				$(document).on('click', '.batalacc', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('riwayat/batalacc/:id') ?>"
					url = url.replace(':id', id)
					$('#batal2').attr('href', url)
				})

			<?php } else if ($menu == 'tahun') { ?>

				$(document).on('click', '.aktif', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('tahun/aktif/:id') ?>"
					url = url.replace(':id', id)
					$('#aktif').attr('href', url)
				})

				$(document).on('click', '.ubah', function () {
					var id = $(this).data('id')
					var tahun = $(this).data('tahun')
					var url = "<?= base_url('tahun/ubah/:id') ?>"
					url = url.replace(':id', id)
					$('form').attr('action', url)
					$('#tahun').val(tahun)
				})

				$(document).on('click', '.hapus', function () {
					var id = $(this).data('id')
					var url = "<?= base_url('tahun/hapus/:id') ?>"
					url = url.replace(':id', id)
					$('#hapus').attr('href', url)
				})

			<?php } ?>
		<?php } ?>
	</script>
	<script>
		$(function () {
			$("#example1").DataTable({
				"responsive": true, "lengthChange": false, "autoWidth": false,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"], "lengthChange": true
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>

</body>
</html>
