<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing extends CI_Controller {
	public function index()
	{
		$status = $this->session->userdata('status');
		$jurusan = $this->session->userdata('jurusan');

		if ($status == 'admin') {
			$query = $this->db->query("SELECT *, jurusan.nama jurusan, makul.nama makul, dosen.nama dosen, (SELECT COUNT(id_ploting) FROM ploting WHERE id_pembimbing = pembimbing.id_pembimbing) mahasiswa FROM pembimbing JOIN jurusan ON pembimbing.id_jurusan = jurusan.id_jurusan JOIN makul ON pembimbing.id_makul = makul.id_makul JOIN dosen ON pembimbing.id_dosen = dosen.id_dosen ORDER BY jurusan.nama")->result();
			$query2 = $this->db->query("SELECT * FROM jurusan ORDER BY nama")->result();
			$query3 = $this->db->query("SELECT * FROM makul ORDER BY nama")->result();
			$query4 = $this->db->query("SELECT * FROM dosen ORDER BY nama")->result();

			$v['jurusan'] = $query2;
			$w['menu'] = 'pembimbing';
		} else {
			$query = $this->db->query("SELECT *, jurusan.nama jurusan, makul.nama makul, dosen.nama dosen, (SELECT COUNT(id_ploting) FROM ploting WHERE id_pembimbing = pembimbing.id_pembimbing) mahasiswa FROM pembimbing JOIN jurusan ON pembimbing.id_jurusan = jurusan.id_jurusan JOIN makul ON pembimbing.id_makul = makul.id_makul JOIN dosen ON pembimbing.id_dosen = dosen.id_dosen WHERE pembimbing.id_jurusan = '$jurusan' ORDER BY jurusan.nama")->result();
			$query3 = $this->db->query("SELECT * FROM makul ORDER BY nama")->result();
			$query4 = $this->db->query("SELECT * FROM dosen ORDER BY nama")->result();

			$w['menu'] = 'pembimbing2';
		}

		$v['data'] = $query;
		$v['makul'] = $query3;
		$v['dosen'] = $query4;

		$this->load->view('header');
		$this->load->view($status.'/pembimbing', $v);
		$this->load->view('footer', $w);
	}

	public function tambah()
	{
		$status = $this->session->userdata('status');

		$jurusan = $status == 'progdi' ? $this->session->userdata('jurusan') : $this->input->post('jurusan');
		$makul = $this->input->post('makul');
		$dosen = $this->input->post('dosen');

		$query = $this->db->query("SELECT * FROM pembimbing WHERE id_jurusan = '$jurusan' && id_makul = '$makul' && id_dosen = '$dosen'")->row();

		if ($query) {
			$this->session->set_flashdata('error', 'Gagal, pembimbing sudah ada.');
		} else {
			$this->db->query("INSERT INTO pembimbing VALUES (null, '$jurusan', '$makul', '$dosen')");
			$this->session->set_flashdata('success', 'Pembimbing berhasil disimpan.');
		}

		redirect('pembimbing');
	}

	public function ubah($id)
	{
		if ($this->session->userdata('status') == 'admin') {
			$jurusan = $this->input->post('jurusan');
			$makul = $this->input->post('makul');
			$dosen = $this->input->post('dosen');

			$query = $this->db->query("SELECT * FROM pembimbing WHERE id_jurusan = '$jurusan' && id_makul = '$makul' && id_dosen = '$dosen' && id_pembimbing != '$id'")->row();

			if ($query) {
				$this->session->set_flashdata('error', 'Gagal, pembimbing sudah ada.');
			} else {
				$this->db->query("UPDATE pembimbing SET id_jurusan = '$jurusan', id_makul = '$makul', id_dosen = '$dosen' WHERE id_pembimbing = '$id'");
				$this->session->set_flashdata('success', 'Pembimbing berhasil diubah.');
			}
		} else {
			$jurusan = $this->session->userdata('jurusan');
			$makul = $this->input->post('makul');
			$dosen = $this->input->post('dosen');

			$query = $this->db->query("SELECT * FROM pembimbing WHERE id_jurusan = '$jurusan' && id_makul = '$makul' && id_dosen = '$dosen' && id_pembimbing != '$id'")->row();

			if ($query) {
				$this->session->set_flashdata('error', 'Gagal, pembimbing sudah ada.');
			} else {
				$this->db->query("UPDATE pembimbing SET id_makul = '$makul', id_dosen = '$dosen' WHERE id_pembimbing = '$id'");
				$this->session->set_flashdata('success', 'Pembimbing berhasil diubah.');
			}
		}

		redirect('pembimbing');
	}

	public function hapus($id)
	{
		$this->db->query("DELETE FROM pembimbing WHERE id_pembimbing = '$id'");
		$this->session->set_flashdata('success', 'Pembimbing berhasil dihapus.');

		redirect('pembimbing');
	}
}
