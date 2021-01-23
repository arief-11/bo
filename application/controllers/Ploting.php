<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ploting extends CI_Controller {
	public function data($id)
	{
		$query = $this->db->query("SELECT * FROM ploting JOIN mahasiswa ON ploting.id_mahasiswa = mahasiswa.id_mahasiswa WHERE id_pembimbing = '$id' ORDER BY nama")->result();
		$query2 = $this->db->query("SELECT *, jurusan.nama jurusan, makul.nama makul, dosen.nama dosen, (SELECT COUNT(id_ploting) FROM ploting WHERE id_pembimbing = pembimbing.id_pembimbing) mahasiswa FROM pembimbing JOIN jurusan ON pembimbing.id_jurusan = jurusan.id_jurusan JOIN makul ON pembimbing.id_makul = makul.id_makul JOIN dosen ON pembimbing.id_dosen = dosen.id_dosen WHERE id_pembimbing = '$id'")->row();
		$id_jurusan = $query2->id_jurusan;
		$query3 = $this->db->query("SELECT * FROM mahasiswa WHERE id_jurusan = '$id_jurusan' ORDER BY nama")->result();

		$v['data'] = $query;
		$v['pembimbing'] = $query2;
		$v['mahasiswa'] = $query3;
		$w['menu'] = 'ploting';

		$this->load->view('header');
		$this->load->view('admin/ploting', $v);
		$this->load->view('footer', $w);
	}

	public function tambah($id)
	{
		$mahasiswa = $this->input->post('mahasiswa');

		$query = $this->db->query("SELECT id_makul FROM pembimbing WHERE id_pembimbing = '$id'")->row();
		$id_makul = $query->id_makul;

		$query2 = $this->db->query("SELECT * FROM ploting JOIN pembimbing ON ploting.id_pembimbing = pembimbing.id_pembimbing WHERE id_mahasiswa = '$mahasiswa' && id_makul = '$id_makul'")->row();

		if ($query2) {
			$this->session->set_flashdata('error', 'Gagal, mahasiswa sudah di ploting.');
		} else {
			$this->db->query("INSERT INTO ploting VALUES (null, '$id', '$mahasiswa')");
			$this->session->set_flashdata('success', 'Mahasiswa berhasil disimpan.');
		}

		redirect('ploting/data/'.$id);
	}

	public function ubah($id, $pembimbing)
	{
		$mahasiswa = $this->input->post('mahasiswa');

		$query = $this->db->query("SELECT id_makul FROM pembimbing WHERE id_pembimbing = '$pembimbing'")->row();
		$id_makul = $query->id_makul;

		$query2 = $this->db->query("SELECT * FROM ploting JOIN pembimbing ON ploting.id_pembimbing = pembimbing.id_pembimbing WHERE id_mahasiswa = '$mahasiswa' && id_makul = '$id_makul' && id_ploting != '$id'")->row();

		if ($query2) {
			$this->session->set_flashdata('error', 'Gagal, mahasiswa sudah di ploting.');
		} else {
			$this->db->query("UPDATE ploting SET id_mahasiswa = '$mahasiswa' WHERE id_ploting = '$id'");
			$this->session->set_flashdata('success', 'Mahasiswa berhasil diubah.');
		}

		redirect('ploting/data/'.$pembimbing);
	}

	public function hapus($id, $pembimbing)
	{
		$this->db->query("DELETE FROM ploting WHERE id_ploting = '$id'");
		$this->session->set_flashdata('success', 'Mahasiswa berhasil dihapus.');

		redirect('ploting/data/'.$pembimbing);
	}
}
