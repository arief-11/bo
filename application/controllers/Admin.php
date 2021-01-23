<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$query = $this->db->query("SELECT * FROM admin ORDER BY nama")->result();

		$v['data'] = $query;
		$w['menu'] = 'admin';

		$this->load->view('header');
		$this->load->view('admin/admin', $v);
		$this->load->view('footer', $w);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("SELECT * FROM admin WHERE username = '$username'")->row();

		if (!$query) {
			$this->db->query("INSERT INTO admin VALUES (null, '$nama', '$username', '$password')");
			$this->session->set_flashdata('success', 'Admin berhasil disimpan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, username sudah ada.');
		}

		redirect('admin');
	}

	public function ubah($id)
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("SELECT * FROM admin WHERE username = '$username' && id_admin != '$id'")->row();

		if (!$query) {
			if ($password) {
				$this->db->query("UPDATE admin SET nama = '$nama', username = '$username', password = '$password' WHERE id_admin = '$id'");
			} else {
				$this->db->query("UPDATE admin SET nama = '$nama', username = '$username' WHERE id_admin = '$id'");
			}
			
			$this->session->set_flashdata('success', 'Admin berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, username sudah ada.');
		}

		redirect('admin');
	}

	public function hapus($id)
	{
		$this->db->query("DELETE FROM admin WHERE id_admin = '$id'");
		$this->session->set_flashdata('success', 'Admin berhasil dihapus.');

		redirect('admin');
	}
}
