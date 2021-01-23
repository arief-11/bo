<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {
	public function index()
	{
		$query = $this->db->query("SELECT * FROM tahun")->result();

		$v['data'] = $query;
		$w['menu'] = 'tahun';

		$this->load->view('header');
		$this->load->view('admin/tahun', $v);
		$this->load->view('footer', $w);
	}

	public function tambah()
	{
		$tahun = $this->input->post('tahun');

		$query = $this->db->query("SELECT * FROM tahun WHERE tahun = '$tahun'")->row();

		if (!$query) {
			$this->db->query("INSERT INTO tahun VALUES (null, '$tahun', 0)");
			$this->session->set_flashdata('success', 'Tahun ajaran berhasil disimpan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, tahun ajaran sudah ada.');
		}

		redirect('tahun');
	}

	public function ubah($id)
	{
		$tahun = $this->input->post('tahun');

		$query = $this->db->query("SELECT * FROM tahun WHERE tahun = '$tahun' && id_tahun != '$id'")->row();

		if (!$query) {
			$this->db->query("UPDATE tahun SET tahun = '$tahun' WHERE id_tahun = '$id'");
			$this->session->set_flashdata('success', 'Tahun ajaran berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, tahun ajaran sudah ada.');
		}

		redirect('tahun');
	}

	public function hapus($id)
	{
		$this->db->query("DELETE FROM tahun WHERE id_tahun = '$id'");
		$this->session->set_flashdata('success', 'Tahun ajaran berhasil dihapus.');

		redirect('tahun');
	}

	public function aktif($id)
	{
		$this->db->query("UPDATE tahun SET status = 0");
		$this->db->query("UPDATE tahun SET status = 1 WHERE id_tahun = '$id'");
		$this->session->set_flashdata('success', 'Tahun ajaran berhasil diaktifkan.');

		redirect('tahun');
	}
}
