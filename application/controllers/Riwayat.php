<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
	public function bimbingan($bimbingan)
	{
		$id = $this->session->userdata('id');

		$query = $this->db->query("SELECT id_mahasiswa, id_makul FROM bimbingan WHERE id_bimbingan = '$bimbingan'")->row();
		$id_mahasiswa = $query->id_mahasiswa;
		$id_makul = $query->id_makul;

		$query2 = $this->db->query("SELECT *, DATE_FORMAT(waktu, '%d/%m/%Y %H:%i') tanggal, DATE_FORMAT(waktu2, '%d/%m/%Y %H:%i') tanggal2 FROM bimbingan WHERE id_makul = '$id_makul' && id_mahasiswa = '$id_mahasiswa' ORDER BY id_bimbingan DESC")->result();

		$query3 = $this->db->query("SELECT mahasiswa.nama nama, jurusan.nama jurusan FROM mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan WHERE id_mahasiswa = '$id_mahasiswa'")->row();
		$query4 = $this->db->query("SELECT nama FROM makul WHERE id_makul = '$id_makul'")->row();
		$query5 = $this->db->query("SELECT nama FROM ploting JOIN pembimbing ON ploting.id_pembimbing = pembimbing.id_pembimbing JOIN dosen ON pembimbing.id_dosen = dosen.id_dosen WHERE id_makul = '$id_makul' && id_mahasiswa = '$id_mahasiswa'")->row();

		$v['data'] = $query2;
		$v['mahasiswa'] = $query3;
		$v['makul'] = $query4->nama;
		$v['dosbing'] = $query5->nama;
		$w['menu'] = 'riwayat';

		$this->load->view('header');
		$this->load->view('dosen/riwayat', $v);
		$this->load->view('footer', $w);
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

		$this->session->set_flashdata('success', 'Bimbingan berhasil direvisi.');

		redirect('riwayat/bimbingan/'.$id);
	}

	public function acc($id)
	{
		$catatan = $this->input->post('catatan');
		
		$this->db->query("UPDATE bimbingan SET status = 2, catatan = '$catatan' WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Bimbingan berhasil di acc.');

		redirect('riwayat/bimbingan/'.$id);
	}

	public function batalrevisi($id)
	{
		$this->db->query("UPDATE bimbingan SET status = NULL, catatan = NULL, file2 = NULL WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Revisi berhasil dibatalkan.');

		redirect('riwayat/bimbingan/'.$id);
	}

	public function batalacc($id)
	{
		$this->db->query("UPDATE bimbingan SET status = NULL, catatan = NULL, file2 = NULL WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Acc berhasil dibatalkan.');

		redirect('riwayat/bimbingan/'.$id);
	}
	
}
