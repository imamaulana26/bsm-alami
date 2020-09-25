<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance_all extends CI_Controller
{
	public function index()
	{
		$data = array(
			'page' => 'sales/v_finance_all',
			'title' => 'Daftar Pembiayaan',
			'data' => $this->db->select('a.*, b.kd_perusahaan, b.nm_perusahaan')->from('tbl_list_pembiayaan a')->join('tbl_profile_perusahaan b', 'a.fk_kd_perusahaan = b.kd_perusahaan', 'left')->get()->result_array()
		);

		$this->load->view('layout/content', $data);
	}

	public function simpan_rac()
	{
		$data = array(
			'fk_kd_invoice' => input('kd_invoice'),
			'kyc_buyer' => input('kyc_buyer'),
			'trade_buyer' => input('td_buyer'),
			'sektor_buyer' => input('sektor_buyer'),
			'kapabilitas_buyer' => input('kap_buyer'),
			'history_buyer' => input('history_buyer'),
			'pembayaran_buyer' => input('pembayaran_buyer'),
			'project_buyer_a' => input('inv_a_buyer'),
			'project_buyer_b' => input('inv_b_buyer'),
			'kol_seller' => input('kol_seller'),
			'kyc_seller' => input('kyc_seller'),
			'trade_seller_1' => input('td_1_seller'),
			'trade_seller_2' => input('td_2_seller'),
			'sektor_seller' => input('sektor_seller'),
			'pengalaman_seller_1' => input('pengalama_1_seller'),
			'pengalaman_seller_2' => input('pengalama_2_seller'),
			'pembayaran_seller' => input('pembayaran_seller')
		);

		$this->db->insert('tbl_analisa', $data);
		$this->db->update('tbl_list_pembiayaan', ['status' => 'Proses Pencairan'], ['kd_invoice' => input('kd_invoice')]);
		redirect(site_url('sales/finance_all'));
	}

	public function detail($key)
	{
		$data = array();

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
}
