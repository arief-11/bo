<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	public function index()
	{
		$query = $this->db->query("SELECT *, jurusan.nama nama, dosen.nama dosen FROM jurusan JOIN dosen ON jurusan.id_dosen = dosen.id_dosen ORDER BY jurusan.nama")->result();
		$query2 = $this->db->query("SELECT * FROM dosen ORDER BY nama")->result();

		$v['data'] = $query;
		$v['dosen'] = $query2;
		$w['menu'] = 'jurusan';

		$this->load->view('header');
		$this->load->view('admin/jurusan', $v);
		$this->load->view('footer', $w);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$singkatan = $this->input->post('singkatan');
		$dosen = $this->input->post('dosen');

		$query = $this->db->query("SELECT * FROM jurusan WHERE nama = '$nama'")->row();

		if (!$query) {
			$this->db->query("INSERT INTO jurusan VALUES (null, '$dosen', '$nama', '$singkatan')");
			$this->session->set_flashdata('success', 'Jurusan berhasil disimpan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, jurusan sudah ada.');
		}

		redirect('jurusan');
	}

	public function ubah($id)
	{
		$nama = $this->input->post('nama');
		$singkatan = $this->input->post('singkatan');
		$dosen = $this->input->post('dosen');

		$query = $this->db->query("SELECT * FROM jurusan WHERE nama = '$nama' && id_jurusan != '$id'")->row();

		if (!$query) {
			$this->db->query("UPDATE jurusan SET id_dosen = '$dosen', nama = '$nama', singkatan = '$singkatan' WHERE id_jurusan = '$id'");		
			$this->session->set_flashdata('success', 'Jurusan berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, jurusan sudah ada.');
		}

		redirect('jurusan');
	}

	public function hapus($id)
	{
		$this->db->query("DELETE FROM jurusan WHERE id_jurusan = '$id'");
		$this->session->set_flashdata('success', 'Jurusan berhasil dihapus.');

		redirect('jurusan');
	}
}
