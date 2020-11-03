<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance_proses extends CI_Controller
{
	public function index()
	{
		$data = array(
			'page' => 'sales/v_finance_proses',
			'title' => 'Daftar Pembiayaan',
			'data' => $this->db->select('a.*, b.kd_perusahaan, b.nm_perusahaan, c.nama')->from('tbl_list_pembiayaan a')
			->join('tbl_profile_perusahaan b', 'a.fk_kd_perusahaan = b.kd_perusahaan', 'left')
			->join('tbl_user c', 'a.kode_ao_pemproses = c.kode_ao', 'left')
			->where(['a.status !=' => 'Pencairan Berhasil', 'a.status !=' => 'Proses pencairan'])
			->get()->result_array()
		);

		$this->load->view('layout/content', $data);
	}
}
