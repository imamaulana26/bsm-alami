<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance_new extends CI_Controller
{
	public function index()
	{
		$data = array(
			'page' => 'sales/v_finance_new',
			'title' => 'Daftar Pembiayaan',
			'data' => $this->db->select('a.*, b.kd_perusahaan, b.nm_perusahaan')->from('tbl_list_pembiayaan a')->join('tbl_profile_perusahaan b', 'a.fk_kd_perusahaan = b.kd_perusahaan', 'left')
			->where(['status' => null])
			->get()->result_array()
		);

		$this->load->view('layout/content', $data);
	}

	public function detail($key)
	{
		$data = array();

		$marketing = $this->db->get_where('tbl_user', ['group_unit_kerja' => $this->session->userdata('cabang'), 'jabatan' => 'BBRM'])->result_array();

		$pembiayaan = $this->db->get_where('tbl_list_pembiayaan', ['kd_invoice' => $key, 'status' => null])->row_array();
		$perusahaan = $this->db->select('*')->from('tbl_profile_perusahaan a')->join('tbl_info_bank_perusahaan b', 'a.kd_perusahaan = b.fk_kd_perusahaan', 'left')->where(['a.kd_perusahaan' => $pembiayaan['fk_kd_perusahaan']])->get()->row_array();

		$data['marketing'] = $marketing;
		$data['pembiayaan'] = $pembiayaan;
		$data['perusahaan'] = $perusahaan;

		echo json_encode($data);
		exit;
	}

	public function penugasan()
	{
		$data = array(
			'kode_ao_pemproses' => input('penugasan'),
			'penugasan' => $this->session->userdata('nip'),
			'tgl_penugasan' => date('Y-m-d'),
			'status' => 'Proses RAC'
		);

		$this->db->update('tbl_list_pembiayaan', $data, ['kd_invoice' => input('id_pembiaayan')]);

		$user = $this->db->get_where('tbl_user', ['kode_ao' => input('penugasan')])->row_array();

		echo json_encode(['msg' => 'Pipeline berhasil diberikan kepada ' . $user['nama']]);
		exit;
	}
}
