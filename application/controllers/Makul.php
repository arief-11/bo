<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makul extends CI_Controller {
	public function index()
	{
		$query = $this->db->query("SELECT * FROM makul ORDER BY nama")->result();

		$v['data'] = $query;
		$w['menu'] = 'makul';

		$this->load->view('header');
		$this->load->view('admin/makul', $v);
		$this->load->view('footer', $w);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$bab = $this->input->post('bab');

		$query = $this->db->query("SELECT * FROM makul WHERE nama = '$nama'")->row();

		if (!$query) {
			$this->db->query("INSERT INTO makul VALUES (null, '$nama', '$bab')");
			$this->session->set_flashdata('success', 'Mata Kuliah berhasil disimpan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, Mata kuliah sudah ada.');
		}

		redirect('makul');
	}

	public function ubah($id)
	{
		$nama = $this->input->post('nama');
		$bab = $this->input->post('bab');

		$query = $this->db->query("SELECT * FROM makul WHERE nama = '$nama' && id_makul != '$id'")->row();

		if (!$query) {
			$this->db->query("UPDATE makul SET nama = '$nama', bab_maks = '$bab' WHERE id_makul = '$id'");
			$this->session->set_flashdata('success', 'Mata kuliah berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, mata kuliah sudah ada.');
		}

		redirect('makul');
	}

	public function hapus($id)
	{
		$this->db->query("DELETE FROM makul WHERE id_makul = '$id'");
		$this->session->set_flashdata('success', 'Mata kuliah berhasil dihapus.');

		redirect('makul');
	}
}
