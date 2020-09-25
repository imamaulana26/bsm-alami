<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
	}

	public function index()
	{
		$data = array(
			'page' => 'sales/v_dashboard',
			'title' => 'Dashboard',
			'data' => $this->db->select('a.*, b.kd_perusahaan, b.nm_perusahaan')->from('tbl_list_pembiayaan a')->join('tbl_profile_perusahaan b', 'a.fk_kd_perusahaan = b.kd_perusahaan', 'left')->get()->result_array()
		);

		$this->load->view('layout/content', $data);
	}
}
