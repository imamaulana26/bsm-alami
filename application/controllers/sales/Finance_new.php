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

		$pembiayaan = $this->db->get_where('tbl_list_pembiayaan', ['kd_invoice' => $key])->row_array();
		$pic = $this->db->get_where('tbl_pic', ['fk_kd_invoice' => $key])->row_array();
		$perusahaan = $this->db->select('*')->from('tbl_profile_perusahaan a')->join('tbl_info_bank_perusahaan b', 'a.kd_perusahaan = b.fk_kd_perusahaan', 'left')->where(['a.kd_perusahaan' => $pembiayaan['fk_kd_perusahaan']])->get()->row_array();

		$pengurus = $this->db->get_where('tbl_profile_pengurus', ['fk_kd_perusahaan' => $perusahaan['kd_perusahaan']])->result_array();
		$pemegang_saham = $this->db->get_where('tbl_pemegang_saham', ['fk_kd_perusahaan' => $perusahaan['kd_perusahaan']])->result_array();
		$portofolio = $this->db->get_where('tbl_portofolio_bisnis', ['fk_kd_invoice' => $key])->result_array();
		$keuangan = $this->db->get_where('tbl_lap_keuangan', ['fk_kd_invoice' => $key])->result_array();

		$agunan_tagihan = $this->db->get_where('tbl_ag_tagihan', ['fk_kd_invoice' => $key])->row_array();
		$tagihan = $this->db->get_where('tbl_tagihan', ['fk_id_tagihan' => $agunan_tagihan['id_tagihan']])->result_array();
		$jaminan = $this->db->get_where('tbl_ag_jaminan', ['fk_kd_invoice' => $key])->row_array();
		$dokumen = $this->db->get_where('tbl_dokumen', ['fk_kd_invoice' => $key])->row_array();
		$survey = $this->db->get_where('tbl_survey', ['fk_kd_invoice' => $key])->row_array();
		$analisa = $this->db->get_where('tbl_analisa', ['fk_kd_invoice' => $key])->row_array();

		$data['marketing'] = $marketing;
		$data['pembiayaan'] = $pembiayaan;
		$data['pic'] = $pic;
		$data['perusahaan'] = $perusahaan;
		$data['pengurus'] = $pengurus;
		$data['portofolio'] = $portofolio;
		$data['keuangan'] = $keuangan;
		$data['pemegang_saham'] = $pemegang_saham;
		$data['ag_tagihan'] = $agunan_tagihan;
		$data['tagihan'] = $tagihan;
		$data['jaminan'] = $jaminan;
		$data['dokumen'] = $dokumen;
		$data['survey'] = $survey;
		$data['analisa'] = $analisa;

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
