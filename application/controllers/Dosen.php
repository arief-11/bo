<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function index()
	{
		$query = $this->db->query("SELECT * FROM dosen ORDER BY nama")->result();

		$v['data'] = $query;
		$w['menu'] = 'dosen';

		$this->load->view('header');
		$this->load->view('admin/dosen', $v);
		$this->load->view('footer', $w);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("SELECT * FROM dosen WHERE username = '$username'")->row();

		if (!$query) {
			$this->db->query("INSERT INTO dosen VALUES (null, '$nama', '$alamat', '$no_hp', '$username', '$password')");
			$this->session->set_flashdata('success', 'Dosen berhasil disimpan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, username sudah ada.');
		}

		redirect('dosen');
	}

	public function ubah($id)
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("SELECT * FROM dosen WHERE username = '$username' && id_dosen != '$id'")->row();

		if (!$query) {
			if ($password) {
				$this->db->query("UPDATE dosen SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', username = '$username', password = '$password' WHERE id_dosen = '$id'");
			} else {
				$this->db->query("UPDATE dosen SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', username = '$username' WHERE id_dosen = '$id'");
			}
			
			$this->session->set_flashdata('success', 'Dosen berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, username sudah ada.');
		}

		redirect('dosen');
	}

	public function hapus($id)
	{
		$this->db->query("DELETE FROM dosen WHERE id_dosen = '$id'");
		$this->session->set_flashdata('success', 'Dosen berhasil dihapus.');

		redirect('dosen');
	}
}
