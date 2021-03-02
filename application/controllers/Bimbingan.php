<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {
	public function index()
	{
		$status = $this->session->userdata('status');

		$query3 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
		$tahun = $query3->id_tahun;

		if ($status == 'progdi') {
			$query = $this->db->query("SELECT * FROM makul ORDER BY nama")->result();

			$v['data'] = $query;
			$v['tahun'] = $tahun;
			$w['menu'] = 'bimbingan2';

			$this->load->view('header');
			$this->load->view('progdi/bimbingan2', $v);
			$this->load->view('footer', $w);
		} else {
			$query = $this->db->query("SELECT id_mahasiswa FROM bimbingan GROUP BY id_mahasiswa ORDER BY id_bimbingan LIMIT 10")->result();
			$a = [];

			foreach ($query as $x) {
				$id_mahasiswa = $x->id_mahasiswa;
				$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan WHERE bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' ORDER BY id_bimbingan DESC")->row();

				if ($query2) {
					$b['id_bimbingan'] = $query2->id_bimbingan;
					$b['tanggal'] = $query2->tanggal;
					$b['mahasiswa'] = $query2->mahasiswa;
					$b['singkatan'] = $query2->singkatan;
					$b['makul'] = $query2->makul;
					$b['bab'] = $query2->bab;
					$b['deskripsi'] = $query2->deskripsi;
					$b['catatan'] = $query2->catatan;
					$b['status'] = $query2->status;
					$b['file'] = $query2->file;
					$b['file2'] = $query2->file2;
					$b['tahun'] = $query2->tahun;

					array_push($a, (object) $b);
				}
			}

			$v['data'] = $a;
			$w['menu'] = 'bimbingan2';

			$this->load->view('header');
			$this->load->view('admin/bimbingan', $v);
			$this->load->view('footer', $w);
		}
	}

	public function bab($bab,$makul)
	{
		$status = $this->session->userdata('status');
		$jurusan = $this->session->userdata('jurusan');

		$output = '';
		$no = 0;

		$query3 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
		$tahun = $query3->id_tahun;

		$query = $this->db->query("SELECT bimbingan.id_mahasiswa FROM bimbingan JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa WHERE id_jurusan = '$jurusan' GROUP BY bimbingan.id_mahasiswa ORDER BY id_bimbingan LIMIT 10")->result();
		$a = [];
		$c = 'Bab '.$bab;

		$mk = $bab;
		$d = '';

		foreach ($query as $x) {

			$no++;
			$id_mahasiswa = $x->id_mahasiswa;

			if($makul != 0 && $c != 'Bab 0'){
				$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal,dosen.nama nama_dosen, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan JOIN pembimbing ON makul.id_makul = pembimbing.id_makul join dosen ON pembimbing.id_dosen = dosen.id_dosen WHERE bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' && bab = '$c' && status = 2 && bimbingan.id_makul = '$makul' ORDER BY id_bimbingan DESC")->row_array();
			}else if($makul != 0 && $c == 'Bab 0'){
				$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal,dosen.nama nama_dosen, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan JOIN pembimbing ON makul.id_makul = pembimbing.id_makul join dosen ON pembimbing.id_dosen = dosen.id_dosen WHERE bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' && status = 2 && bimbingan.id_makul = '$makul' ORDER BY id_bimbingan DESC")->row_array();
			}else if($c != 'Bab 0' && $makul == 0){
				$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal,dosen.nama nama_dosen, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan JOIN pembimbing ON makul.id_makul = pembimbing.id_makul join dosen ON pembimbing.id_dosen = dosen.id_dosen WHERE bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' && bab = '$c' && status = 2 ORDER BY id_bimbingan DESC")->row_array();
			}else{
			}

			if ($query2) {
				if ($query2['status'] == 1) { $d = "<span class='text-danger'>Revisi</span>";

			}
			else if ($query2['status'] == 2) { $d = "<span class='text-success'>Acc</span>";
		}
		else { $d = "<span class='text-primary'>Menunggu</span>"; }
		$output .='<tr>
		<td class="text-center">'.$no.'</td>
		<td>'.$query2['nim'].'</td>
		<td>'.$query2['nama_dosen'].'</td>
		<td>'.$query2['tanggal'].'</td>

		<td>'.$query2['mahasiswa'].'</td>
		<td>'.$query2['makul'].'</td>
		<td>'.$query2['bab'].'</td>
		<td>'.$query2['deskripsi'].'</td>
		<td>'.$query2['catatan'].'</td>
		<td style="font-weight: 600;">'.$d.'</td>
		<td class="text-center">
		<div class="btn-group">
		<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
		Opsi <span class="caret"></span>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item"  href="'.base_url().'riwayat/bimbingan/'.$query2['id_bimbingan'].'">
		Riwayat Bimbingan
		</a>
		</div>
		</div>
		</td>
		</tr>';
	}
}

echo $output;
}

	// public function tt($makul)
	// {
	// 	$status = $this->session->userdata('status');
	// 	$jurusan = $this->session->userdata('jurusan');

	// 	$query3 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
	// 	$tahun = $query3->id_tahun;

	// 	$query = $this->db->query("SELECT bimbingan.id_mahasiswa FROM bimbingan JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa WHERE id_jurusan = '$jurusan' GROUP BY bimbingan.id_mahasiswa ORDER BY id_bimbingan LIMIT 10")->result();
	// 	$a = [];

	// 	foreach ($query as $x) {
	// 		$id_mahasiswa = $x->id_mahasiswa;
	// 		$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan WHERE bimbingan.id_mahasiswa = '$id_mahasiswa' and makul.id_makul = $makul ORDER BY id_bimbingan DESC")->row();

	// 		if ($query2) {
	// 			$b['id_bimbingan'] = $query2->id_bimbingan;
	// 			$b['tanggal'] = $query2->tanggal;
	// 			$b['mahasiswa'] = $query2->mahasiswa;
	// 			$b['singkatan'] = $query2->singkatan;
	// 			$b['makul'] = $query2->makul;
	// 			$b['bab'] = $query2->bab;
	// 			$b['deskripsi'] = $query2->deskripsi;
	// 			$b['catatan'] = $query2->catatan;
	// 			$b['status'] = $query2->status;
	// 			$b['file'] = $query2->file;
	// 			$b['file2'] = $query2->file2;
	// 			$b['tahun'] = $query2->tahun;

	// 			array_push($a, (object) $b);
	// 		}
	// 	}

	// 	$v['data'] = $a;
	// 	$w['menu'] = 'bimbingan2';

	// 	$this->load->view('header');
	// 	$this->load->view('progdi/bimbingan', $v);
	// 	$this->load->view('footer', $w);
	// }

public function semua()
{
	$id = $this->session->userdata('id');

	$query4 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
	$tahun = $query4->id_tahun;

	$query = $this->db->query("SELECT id_mahasiswa FROM bimbingan GROUP BY id_mahasiswa ORDER BY id_bimbingan")->result();
	$a = [];

	foreach ($query as $x) {
		$id_mahasiswa = $x->id_mahasiswa;
		$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN pembimbing ON makul.id_makul = pembimbing.id_makul JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan JOIN ploting ON ploting.id_pembimbing = pembimbing.id_pembimbing WHERE pembimbing.id_dosen = '$id' && ploting.id_mahasiswa = bimbingan.id_mahasiswa && bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' ORDER BY id_bimbingan DESC")->row();

		if ($query2) {
			$b['id_bimbingan'] = $query2->id_bimbingan;
			$b['tanggal'] = $query2->tanggal;
			$b['mahasiswa'] = $query2->mahasiswa;
			$b['singkatan'] = $query2->singkatan;
			$b['makul'] = $query2->makul;
			$b['bab'] = $query2->bab;
			$b['deskripsi'] = $query2->deskripsi;
			$b['catatan'] = $query2->catatan;
			$b['status'] = $query2->status;
			$b['file'] = $query2->file;
			$b['file2'] = $query2->file2;
			$b['tahun'] = $query2->tahun;

			array_push($a, (object) $b);
		}
	}

	$v['data'] = $a;
	$w['menu'] = 'semua';

	$this->load->view('header');
	$this->load->view('dosen/bimbingan', $v);
	$this->load->view('footer', $w);
}

public function menunggu()
{
	$id = $this->session->userdata('id');

	$query4 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
	$tahun = $query4->id_tahun;

	$query = $this->db->query("SELECT id_mahasiswa FROM bimbingan GROUP BY id_mahasiswa ORDER BY id_bimbingan")->result();
	$a = [];

	foreach ($query as $x) {
		$id_mahasiswa = $x->id_mahasiswa;
		$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN pembimbing ON makul.id_makul = pembimbing.id_makul JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan JOIN ploting ON ploting.id_pembimbing = pembimbing.id_pembimbing WHERE pembimbing.id_dosen = '$id' && ploting.id_mahasiswa = bimbingan.id_mahasiswa && bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' && bimbingan.status IS NULL ORDER BY id_bimbingan DESC")->row();

		if ($query2) {
			$b['id_bimbingan'] = $query2->id_bimbingan;
			$b['tanggal'] = $query2->tanggal;
			$b['mahasiswa'] = $query2->mahasiswa;
			$b['singkatan'] = $query2->singkatan;
			$b['makul'] = $query2->makul;
			$b['bab'] = $query2->bab;
			$b['deskripsi'] = $query2->deskripsi;
			$b['catatan'] = $query2->catatan;
			$b['status'] = $query2->status;
			$b['file'] = $query2->file;
			$b['file2'] = $query2->file2;
			$b['tahun'] = $query2->tahun;

			array_push($a, (object) $b);
		}
	}

	$v['data'] = $a;
	$w['menu'] = 'semua';

	$this->load->view('header');
	$this->load->view('dosen/menunggu', $v);
	$this->load->view('footer', $w);
}

public function revisi()
{
	$id = $this->session->userdata('id');

	$query4 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
	$tahun = $query4->id_tahun;

	$query = $this->db->query("SELECT id_mahasiswa FROM bimbingan GROUP BY id_mahasiswa ORDER BY id_bimbingan")->result();
	$a = [];

	foreach ($query as $x) {
		$id_mahasiswa = $x->id_mahasiswa;
		$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN pembimbing ON makul.id_makul = pembimbing.id_makul JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan JOIN ploting ON ploting.id_pembimbing = pembimbing.id_pembimbing WHERE pembimbing.id_dosen = '$id' && ploting.id_mahasiswa = bimbingan.id_mahasiswa && bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' && bimbingan.status = 1 ORDER BY id_bimbingan DESC")->row();

		if ($query2) {
			$b['id_bimbingan'] = $query2->id_bimbingan;
			$b['tanggal'] = $query2->tanggal;
			$b['mahasiswa'] = $query2->mahasiswa;
			$b['singkatan'] = $query2->singkatan;
			$b['makul'] = $query2->makul;
			$b['bab'] = $query2->bab;
			$b['deskripsi'] = $query2->deskripsi;
			$b['catatan'] = $query2->catatan;
			$b['status'] = $query2->status;
			$b['file'] = $query2->file;
			$b['file2'] = $query2->file2;
			$b['tahun'] = $query2->tahun;

			array_push($a, (object) $b);
		}
	}

	$v['data'] = $a;
	$w['menu'] = 'semua';

	$this->load->view('header');
	$this->load->view('dosen/revisi', $v);
	$this->load->view('footer', $w);
}

public function acc()
{
	$id = $this->session->userdata('id');

	$query4 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
	$tahun = $query4->id_tahun;

	$query = $this->db->query("SELECT id_mahasiswa FROM bimbingan GROUP BY id_mahasiswa ORDER BY id_bimbingan")->result();
	$a = [];

	foreach ($query as $x) {
		$id_mahasiswa = $x->id_mahasiswa;
		$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN pembimbing ON makul.id_makul = pembimbing.id_makul JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan JOIN ploting ON ploting.id_pembimbing = pembimbing.id_pembimbing WHERE pembimbing.id_dosen = '$id' && ploting.id_mahasiswa = bimbingan.id_mahasiswa && bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' && bimbingan.status = 2 ORDER BY id_bimbingan DESC")->row();

		if ($query2) {
			$b['id_bimbingan'] = $query2->id_bimbingan;
			$b['tanggal'] = $query2->tanggal;
			$b['mahasiswa'] = $query2->mahasiswa;
			$b['singkatan'] = $query2->singkatan;
			$b['makul'] = $query2->makul;
			$b['bab'] = $query2->bab;
			$b['deskripsi'] = $query2->deskripsi;
			$b['catatan'] = $query2->catatan;
			$b['status'] = $query2->status;
			$b['file'] = $query2->file;
			$b['file2'] = $query2->file2;
			$b['tahun'] = $query2->tahun;

			array_push($a, (object) $b);
		}
	}

	$v['data'] = $a;
	$w['menu'] = 'semua';

	$this->load->view('header');
	$this->load->view('dosen/acc', $v);
	$this->load->view('footer', $w);
}

public function makul($makul)
{
	$id = $this->session->userdata('id');

	$query4 = $this->db->query("SELECT * FROM tahun WHERE status = 1")->row();
	$tahun = $query4->id_tahun;

	$query = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal FROM bimbingan WHERE id_mahasiswa = '$id' && id_makul = '$makul' && id_tahun = '$tahun' ORDER BY id_bimbingan DESC")->result();
	$query2 = $this->db->query("SELECT * FROM makul WHERE id_makul = '$makul'")->row();

	$query3 = $this->db->query("SELECT nama FROM ploting JOIN pembimbing ON ploting.id_pembimbing = pembimbing.id_pembimbing JOIN dosen ON pembimbing.id_dosen = dosen.id_dosen WHERE id_makul = '$makul' && id_mahasiswa = '$id'")->row();

	$v['data'] = $query;
	$v['makul'] = $query2;
	$v['dosbing'] = $query3 ? $query3->nama : NULL;
	$v['tahun'] = $query4->tahun;
	$w['menu'] = 'bimbingan';

	$this->load->view('header');
	$this->load->view('mahasiswa/bimbingan', $v);
	$this->load->view('footer', $w);
}

public function tambah($makul)
{
	date_default_timezone_set('Asia/Jakarta');
	$year = date('y'); $month = date('m'); $day = date('d');
	$hour = date('H'); $minute = date('i'); $second = date('s');

	$id = $this->session->userdata('id');
	$bab = $this->input->post('bab');
	$deskripsi = $this->input->post('deskripsi');
	$tahun2 = $this->input->post('tahun');

	$file_tmp = $_FILES['file']['tmp_name'];
	$file_name = $year.$month.$day.'_'.$hour.$minute.$second.'.'.end((explode('.', $_FILES['file']['name'])));

	move_uploaded_file($file_tmp, 'file/'.$file_name);

	$query = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
	$tahun = $query->id_tahun;

	$this->db->query("INSERT INTO bimbingan VALUES (null, '$tahun', '$id', '$makul', '$bab', '$file_name', '$deskripsi', null, null, null, null, '$tahun2', null)");
	$this->session->set_flashdata('success', 'Bimbingan berhasil dikirim.');

	redirect('bimbingan/makul/'.$makul);
}

public function hapus($id, $makul)
{
	$this->db->query("DELETE FROM bimbingan WHERE id_bimbingan = '$id'");
	$this->session->set_flashdata('success', 'Bimbingan berhasil dihapus.');

	redirect('bimbingan/makul/'.$makul);
}

public function hapus2($id)
{
	$this->db->query("DELETE FROM bimbingan WHERE id_bimbingan = '$id'");
	$this->session->set_flashdata('success', 'Bimbingan berhasil dihapus.');

	redirect('bimbingan');
}

public function revisi2($id)
{
	date_default_timezone_set('Asia/Jakarta');
	$year = date('y'); $month = date('m'); $day = date('d');
	$hour = date('H'); $minute = date('i'); $second = date('s');

	$catatan = $this->input->post('catatan');

	if ($_FILES['file']['tmp_name']) {
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_name = $year.$month.$day.'_'.$hour.$minute.$second.'.'.end((explode('.', $_FILES['file']['name'])));
		move_uploaded_file($file_tmp, 'file/'.$file_name);

		$this->db->query("UPDATE bimbingan SET status = 1, catatan = '$catatan', file2 = '$file_name' WHERE id_bimbingan = '$id'");
	} else {
		$this->db->query("UPDATE bimbingan SET status = 1, catatan = '$catatan' WHERE id_bimbingan = '$id'");
	}

	$this->session->set_flashdata('success', 'Bimbingan berhasil direvisi.');

	redirect('bimbingan/menunggu');
}

public function acc2($id)
{
	$catatan = $this->input->post('catatan');
	
	$this->db->query("UPDATE bimbingan SET status = 2, catatan = '$catatan' WHERE id_bimbingan = '$id'");
	$this->session->set_flashdata('success', 'Bimbingan berhasil di acc.');

	redirect('bimbingan/menunggu');
}

public function batalrevisi($id)
{
	$this->db->query("UPDATE bimbingan SET status = NULL, catatan = NULL, file2 = NULL WHERE id_bimbingan = '$id'");
	$this->session->set_flashdata('success', 'Revisi berhasil dibatalkan.');

	redirect('bimbingan/revisi');
}

public function batalacc($id)
{
	$this->db->query("UPDATE bimbingan SET status = NULL, catatan = NULL, file2 = NULL WHERE id_bimbingan = '$id'");
	$this->session->set_flashdata('success', 'Acc berhasil dibatalkan.');

	redirect('bimbingan/acc');
}
	// public function profil()
	// {
	// 	$id = $this->session->userdata('id');
	// $query2 = $this->db->query("SELECT *, mahasiswa.nama nama, jurusan.nama jurusan FROM mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan WHERE id_mahasiswa = '$id'")->row();


	// 	$w['menu'] = 'bimbingan';
	// 	$v['profil'] = $query2;

	// 	$this->load->view('header');
	// 	$this->load->view('mahasiswa/profil', $v);
	// 	$this->load->view('footer', $w);
	// }

public function tabel()
{
	$status = $this->session->userdata('status');
	$jurusan = $this->session->userdata('jurusan');

	$query3 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
	$tahun = $query3->id_tahun;

	if ($status == 'progdi') {
		$query = $this->db->query("SELECT bimbingan.id_mahasiswa FROM bimbingan JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa WHERE id_jurusan = '$jurusan' GROUP BY bimbingan.id_mahasiswa ORDER BY id_bimbingan LIMIT 10")->result();
		$a = [];

		foreach ($query as $x) {
			$id_mahasiswa = $x->id_mahasiswa;
			$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan WHERE bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' ORDER BY id_bimbingan DESC")->row();

			if ($query2) {
				$b['id_bimbingan'] = $query2->id_bimbingan;
				$b['tanggal'] = $query2->tanggal;
				$b['mahasiswa'] = $query2->mahasiswa;
				$b['singkatan'] = $query2->singkatan;
				$b['makul'] = $query2->makul;
				$b['bab'] = $query2->bab;
				$b['deskripsi'] = $query2->deskripsi;
				$b['catatan'] = $query2->catatan;
				$b['status'] = $query2->status;
				$b['file'] = $query2->file;
				$b['file2'] = $query2->file2;
				$b['tahun'] = $query2->tahun;

				array_push($a, (object) $b);
			}
		}

		$v['data'] = $a;
		

			// $this->load->view('header');
		$this->load->view('progdi/tabel', $v);
			// $this->load->view('footer', $w);
	} 
}
}
