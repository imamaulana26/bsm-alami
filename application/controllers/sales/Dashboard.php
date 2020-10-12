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
		$qry = $this->db->select('a.*, b.kd_perusahaan, b.nm_perusahaan, c.*, d.*, e.*')
			->from('tbl_list_pembiayaan a')
			->join('tbl_profile_perusahaan b', 'a.fk_kd_perusahaan = b.kd_perusahaan', 'left')
			->join('tbl_ag_tagihan c', 'c.fk_kd_invoice = a.kd_invoice', 'left')
			->join('tbl_tagihan d', 'c.id_tagihan = d.fk_id_tagihan', 'left')
			->join('tbl_user e', 'a.kode_ao_pemproses = e.kode_ao', 'left')
			->get()->result_array();

		$data = array(
			'page' => 'sales/v_dashboard',
			'title' => 'Dashboard',
			'data' => $qry
		);

		$this->load->view('layout/content', $data);
	}
}
