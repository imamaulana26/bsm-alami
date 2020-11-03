<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance_komite extends CI_Controller
{
	public function index()
	{
		$where = "(a.status = 'Proses komite' or a.status = 'Revisi komite') and c.unit_kerja = '" . $_SESSION['cabang'] . "'";
		$data = array(
			'page' => 'sales/v_finance_komite',
			'title' => 'Daftar Pembiayaan',
			'data' => $this->db->select('a.*, b.kd_perusahaan, b.nm_perusahaan, c.nama')
				->from('tbl_list_pembiayaan a')
				->join('tbl_profile_perusahaan b', 'a.fk_kd_perusahaan = b.kd_perusahaan', 'left')
				->join('tbl_user c', 'a.kode_ao_pemproses = c.kode_ao', 'left')
				->where($where)
				->get()->result_array()
		);

		$this->load->view('layout/content', $data);
	}

	public function komite($id)
	{
		$fin = $this->db->get_where('tbl_list_pembiayaan', ['kd_invoice' => $id])->row_array();
		$bbrm = $this->db->get_where('tbl_user', ['kode_ao' => $fin['kode_ao_pemproses']])->row_array();
		$abbm = $this->db->get_where('tbl_user', ['nip' => $fin['penugasan']])->row_array();

		$data['bbrm'] = $bbrm;
		$data['abbm'] = $abbm;

		echo json_encode($data);
		exit;
	}

	public function submit_komite()
	{
		$data = array(
			'fk_kd_invoice' => input('inv_komite'),
			'nm_abbm' => input('inputABBM'),
			'nm_marketing' => input('inputBBRM'),
			'nm_risk_officer' => input('inputRRO'),
			'nm_area_manager' => input('inputAM'),
			'hasil_komite' => input('hsl_komite'),
			'catatan_komite' => $this->input->post('note_komite'),
			'tgl_komite' => date('Y-m-d')
		);

		if ($data['hasil_komite'] == 'disetujui') {
			$this->db->update('tbl_list_pembiayaan', ['status' => 'Proses pencairan']);
			$this->db->insert('tbl_komite', $data);
		} else {
			$this->db->update('tbl_list_pembiayaan', ['status' => 'Revisi komite']);
			$this->db->insert('tbl_komite', $data);
		}

		$this->session->set_flashdata('msg', 'Catatan komite berhasil disimpan');
		redirect(site_url('sales/finance_komite'));
	}
}
