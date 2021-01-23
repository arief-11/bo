<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}

	public function cek()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$status = $this->input->post('status');

		if ($status == 'progdi') {
			$query = $this->db->query("SELECT *, dosen.nama nama FROM dosen JOIN jurusan ON jurusan.id_dosen = dosen.id_dosen WHERE username = '$username'")->row();

			if ($query) {
				$query2 = $this->db->query("SELECT * FROM dosen JOIN jurusan ON jurusan.id_dosen = dosen.id_dosen WHERE username = '$username' && password = '$password'")->row();
				if ($query2) {
					$id = 'id_dosen';
					$a['id'] = $query->$id;
					$a['nama'] = $query->nama;
					$a['foto'] = $query->foto;
					$a['status'] = 'progdi';
					$a['login'] = TRUE;
					$a['jurusan'] = $query->id_jurusan;

					$this->session->set_userdata($a);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('pesan', 'Login gagal, password salah.');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('pesan', 'Login gagal, username salah.');
					redirect('login');
			}
		} else {
			$tb_username = $status == 'mahasiswa' ? 'nim' : 'username';
			$query = $this->db->query("SELECT * FROM $status WHERE $tb_username = '$username'")->row();

			if ($query) {
				$query2 = $this->db->query("SELECT * FROM $status WHERE $tb_username = '$username' && password = '$password'")->row();
				if ($query2) {
					$id = 'id_'.$status;
					$a['id'] = $query->$id;
					$a['nama'] = $query->nama;
					$a['foto'] = $query->foto;
					$a['status'] = $status;
					$a['login'] = TRUE;
					$a['jurusan'] = $status == 'mahasiswa' ? $query->id_jurusan : NULL;

					$this->session->set_userdata($a);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('pesan', 'Login gagal, password salah.');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('pesan', 'Login gagal, username salah.');
					redirect('login');
			}
		}
	}

	public function logout() {
		$a = ['id', 'nama', 'foto', 'status', 'login'];
		$this->session->unset_userdata($a);

		redirect('login');
	}
}
