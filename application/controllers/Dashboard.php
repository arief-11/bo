<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$id = $this->session->userdata('id');
		$status = $this->session->userdata('status');
		$jurusan = $this->session->userdata('jurusan');

		$query3 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
		$tahun = $query3->id_tahun;

		if ($status == 'mahasiswa') {
			$jurusan = $this->session->userdata('jurusan');
			$query = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul WHERE id_mahasiswa = '$id' && id_tahun = '$tahun' ORDER BY id_bimbingan DESC LIMIT 10")->result();
			$query2 = $this->db->query("SELECT *, mahasiswa.nama nama, jurusan.nama jurusan FROM mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan WHERE id_mahasiswa = '$id'")->row();

			$v['data'] = $query;
			$v['profil'] = $query2;
		} else if ($status == 'dosen') {
			$query = $this->db->query("SELECT id_mahasiswa FROM bimbingan GROUP BY id_mahasiswa ORDER BY id_bimbingan LIMIT 10")->result();
			$a = [];

			foreach ($query as $x) {
				$id_mahasiswa = $x->id_mahasiswa;
				$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y') tanggal, makul.nama makul, mahasiswa.nama mahasiswa FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa JOIN pembimbing ON makul.id_makul = pembimbing.id_makul JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan WHERE pembimbing.id_dosen = '$id' && bimbingan.id_mahasiswa = '$id_mahasiswa' && id_tahun = '$tahun' ORDER BY id_bimbingan DESC")->row();

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

					array_push($a, (object) $b);
				}
			}

			$menunggu = $this->db->query("SELECT COUNT(id_bimbingan) jumlah FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN pembimbing ON makul.id_makul = pembimbing.id_makul WHERE pembimbing.id_dosen = '$id' && status IS NULL && id_tahun = '$tahun'")->row();
			$revisi = $this->db->query("SELECT COUNT(id_bimbingan) jumlah FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN pembimbing ON makul.id_makul = pembimbing.id_makul WHERE pembimbing.id_dosen = '$id' && status = 1 && id_tahun = '$tahun'")->row();
			$acc = $this->db->query("SELECT COUNT(id_bimbingan) jumlah FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN pembimbing ON makul.id_makul = pembimbing.id_makul WHERE pembimbing.id_dosen = '$id' && status = 2 && id_tahun = '$tahun'")->row();
			$semua = $this->db->query("SELECT COUNT(id_bimbingan) jumlah FROM bimbingan JOIN makul ON bimbingan.id_makul = makul.id_makul JOIN pembimbing ON makul.id_makul = pembimbing.id_makul WHERE pembimbing.id_dosen = '$id' && id_tahun = '$tahun'")->row();

			usort($a, function($a, $b)
			{
				return strcmp($a->id_bimbingan, $b->id_bimbingan);
			});
			
			$v['data'] = $a;
			$v['menunggu'] = $menunggu->jumlah;
			$v['revisi'] = $revisi->jumlah;
			$v['acc'] = $acc->jumlah;
			$v['semua'] = $semua->jumlah;
		} else if ($status == 'progdi') {
			$query = $this->db->query("SELECT bimbingan.id_mahasiswa FROM bimbingan JOIN mahasiswa ON bimbingan.id_mahasiswa = mahasiswa.id_mahasiswa WHERE id_jurusan = '$jurusan' && id_tahun = '$tahun' GROUP BY bimbingan.id_mahasiswa ORDER BY id_bimbingan LIMIT 10")->result();
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

					array_push($a, (object) $b);
				}
			}

			$query2 = $this->db->query("SELECT * FROM jurusan WHERE id_jurusan = '$jurusan'")->row();

			usort($a, function($a, $b)
			{
				return strcmp($a->id_bimbingan, $b->id_bimbingan);
			});

			$v['data'] = $a;
			$v['progdi'] = $query2->nama;
		} else {
			$mahasiswa = $this->db->query("SELECT COUNT(id_mahasiswa) jumlah FROM mahasiswa")->row();
			$dosen = $this->db->query("SELECT COUNT(id_dosen) jumlah FROM dosen")->row();
			$admin = $this->db->query("SELECT COUNT(id_admin) jumlah FROM admin")->row();
			$makul = $this->db->query("SELECT COUNT(id_makul) jumlah FROM makul")->row();

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

					array_push($a, (object) $b);
				}
			}

			$v['mahasiswa'] = $mahasiswa->jumlah;
			$v['dosen'] = $dosen->jumlah;
			$v['admin'] = $admin->jumlah;
			$v['makul'] = $makul->jumlah;
			$v['data'] = $a;
		}

		$w['menu'] = 'dashboard';

		$this->load->view('header');
		$this->load->view($status.'/dashboard', $v);
		$this->load->view('footer', $w);
	}

	public function hapus($id)
	{
		$this->db->query("DELETE FROM bimbingan WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Bimbingan berhasil dihapus.');

		redirect('dashboard');
	}

	public function revisi($id)
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

		$this->session->set_flashdata('success', 'Bimbingan berhasil di revisi.');

		redirect('dashboard');
	}

	public function acc($id)
	{
		$catatan = $this->input->post('catatan');
		
		$this->db->query("UPDATE bimbingan SET status = 2, catatan = '$catatan' WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Bimbingan berhasil di acc.');

		redirect('dashboard');
	}

	public function batalrevisi($id)
	{
		$this->db->query("UPDATE bimbingan SET status = NULL, catatan = NULL, file2 = NULL WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Revisi berhasil dibatalkan.');

		redirect('dashboard');
	}

	public function batalacc($id)
	{
		$this->db->query("UPDATE bimbingan SET status = NULL, catatan = NULL, file2 = NULL WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Acc berhasil dibatalkan.');

		redirect('dashboard');
	}
}
