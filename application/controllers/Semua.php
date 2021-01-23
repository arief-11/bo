<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semua extends CI_Controller {
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

		redirect('bimbingan/semua');
	}

	public function acc($id)
	{
		$catatan = $this->input->post('catatan');
		
		$this->db->query("UPDATE bimbingan SET status = 2, catatan = '$catatan' WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Bimbingan berhasil di acc.');

		redirect('bimbingan/semua');
	}

	public function batalrevisi($id)
	{
		$this->db->query("UPDATE bimbingan SET status = NULL, catatan = NULL, file2 = NULL WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Revisi berhasil dibatalkan.');

		redirect('bimbingan/semua');
	}

	public function batalacc($id)
	{
		$this->db->query("UPDATE bimbingan SET status = NULL, catatan = NULL, file2 = NULL WHERE id_bimbingan = '$id'");
		$this->session->set_flashdata('success', 'Acc berhasil dibatalkan.');

		redirect('bimbingan/semua');
	}
}
