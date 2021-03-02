<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
	public function index()
	{
		$query3 = $this->db->query("SELECT id_tahun FROM tahun WHERE status = 1")->row();
		$tahun = $query3->id_tahun;

		$query = $this->db->query("SELECT * FROM makul ORDER BY nama")->result();

		$v['data'] = $query;
		$v['tahun'] = $tahun;
		$w['menu'] = 'monitoring';

		$this->load->view('header');
		$this->load->view('dosen/monitoring', $v);
		$this->load->view('footer', $w);
	}
}
