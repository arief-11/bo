<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function index()
	{
		$query = $this->db->query("SELECT *, mahasiswa.nama nama, jurusan.nama jurusan FROM mahasiswa JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan ORDER BY mahasiswa.nama")->result();
		$query2 = $this->db->query("SELECT * FROM jurusan")->result();

		$v['data'] = $query;
		$v['jurusan'] = $query2;
		$w['menu'] = 'mahasiswa';

		$this->load->view('header');
		$this->load->view('admin/mahasiswa', $v);
		$this->load->view('footer', $w);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$jurusan = $this->input->post('jurusan');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim = '$nim'")->row();

		if (!$query) {
			$this->db->query("INSERT INTO mahasiswa VALUES (null, '$jurusan', '$nama', '$nim', '$alamat', '$no_hp', '$password')");
			$this->session->set_flashdata('success', 'Mahasiswa berhasil disimpan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, NIM sudah ada.');
		}

		redirect('mahasiswa');
	}

	public function ubah($id)
	{
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$jurusan = $this->input->post('jurusan');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim = '$nim' && id_mahasiswa != '$id'")->row();

		if (!$query) {
			if ($password) {
				$this->db->query("UPDATE mahasiswa SET id_jurusan = '$jurusan', nama = '$nama', nim = '$nim', alamat = '$alamat', no_hp = '$no_hp', password = '$password' WHERE id_mahasiswa = '$id'");
			} else {
				$this->db->query("UPDATE mahasiswa SET id_jurusan = '$jurusan', nama = '$nama', nim = '$nim', alamat = '$alamat', no_hp = '$no_hp' WHERE id_mahasiswa = '$id'");
			}
			
			$this->session->set_flashdata('success', 'Mahasiswa berhasil diubah.');
		} else {
			$this->session->set_flashdata('error', 'Gagal, NIM sudah ada.');
		}

		redirect('mahasiswa');
	}

	public function hapus($id)
	{
		$this->db->query("DELETE FROM mahasiswa WHERE id_mahasiswa = '$id'");
		$this->session->set_flashdata('success', 'Mahasiswa berhasil dihapus.');

		redirect('mahasiswa');
	}
}
