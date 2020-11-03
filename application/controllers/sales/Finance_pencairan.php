<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance_pencairan extends CI_Controller
{
	public function index()
	{
		$data = array(
			'page' => 'sales/v_finance_pencairan',
			'title' => 'Daftar Proses Pencairan',
			'data' => $this->db->select('a.*, b.kd_perusahaan, b.nm_perusahaan, c.nama')->from('tbl_list_pembiayaan a')
			->join('tbl_profile_perusahaan b', 'a.fk_kd_perusahaan = b.kd_perusahaan', 'left')
			->join('tbl_user c', 'a.kode_ao_pemproses = c.kode_ao', 'left')
			->where(['a.status' => 'Proses pencairan'])
			->get()->result_array()
		);

		$this->load->view('layout/content', $data);
	}
}
