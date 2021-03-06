<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class Finance extends CI_Controller
{
	public function index()
	{
		$data = array(
			'page' => 'sales/v_finance',
			'title' => 'Daftar Pembiayaan',
			'data' => $this->db->select('a.*, b.kd_perusahaan, b.nm_perusahaan')->from('tbl_list_pembiayaan a')
				->join('tbl_profile_perusahaan b', 'a.fk_kd_perusahaan = b.kd_perusahaan', 'left')
				->where(['a.kode_ao_pemproses' => $this->session->userdata('kode_ao')])
				->get()->result_array()
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
			'pengalaman_seller_1' => input('pengalaman_1_seller'),
			'pengalaman_seller_2' => input('pengalaman_2_seller'),
			'pembayaran_seller' => input('pembayaran_seller')
		);

		$this->db->insert('tbl_analisa', $data);
		if (array_sum($data) < 16) {
			$this->db->update('tbl_list_pembiayaan', ['status' => 'RAC tidak terpenuhi'], ['kd_invoice' => input('kd_invoice')]);
		} else {
			$this->db->update('tbl_list_pembiayaan', ['status' => 'Upload history tagihan'], ['kd_invoice' => input('kd_invoice')]);
		}
		redirect(site_url('sales/finance'));
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

		$cek_history = $this->db->get_where('tbl_riwayat_tagihan', ['fk_kd_invoice' => $key])->num_rows();
		if ($cek_history > 0) {
			$history = $this->db->get_where('tbl_riwayat_tagihan', ['fk_kd_invoice' => $key])->result_array();
			$data['history'] = $history;
		}

		$cek_agunan = $this->db->get_where('tbl_agunan', ['fk_kd_invoice' => $key])->num_rows();
		if($cek_agunan > 0){
			$data['agunan'] = $this->db->get_where('tbl_agunan', ['fk_kd_invoice' => $key])->result_array();
		}

		$cek_analisa_agn = $this->db->get_where('tbl_analisa_agunan', ['fk_kd_invoice' => $key])->num_rows();
		if($cek_analisa_agn > 0){
			$data['analisa_agn'] = $this->db->get_where('tbl_analisa_agunan', ['fk_kd_invoice' => $key])->row_array();
		}
		
		$cek_usulan = $this->db->get_where('tbl_usulan', ['fk_kd_invoice' => $key])->num_rows();
		if($cek_usulan > 0){
			$usulan = $this->db->get_where('tbl_usulan', ['fk_kd_invoice' => $key])->row_array();
			$data['usulan'] = $usulan;
			$data['biaya_lain'] = unserialize($usulan['biaya_lain']);
		}

		$cek_syarat = $this->db->get_where('tbl_syarat', ['fk_kd_invoice' => $key])->num_rows();
		if($cek_syarat > 0){
			$syarat = $this->db->get_where('tbl_syarat', ['fk_kd_invoice' => $key])->row_array();

			$row = array();
			$row['akad'] = unserialize($syarat['syarat_akad']);
			$row['cair'] = unserialize($syarat['syarat_cair']);
			$row['lain'] = unserialize($syarat['syarat_lain']);

			$data['syarat'] = $row;
		}

		$cek_komite = $this->db->get_where('tbl_komite', ['fk_kd_invoice' => $key])->num_rows();
		if ($cek_komite > 0) {
			$komite = $this->db->get_where('tbl_komite', ['fk_kd_invoice' => $key])->result_array();
			$data['komite'] = $komite;
		}

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

	public function history_tagihan($key)
	{
		$avg_bln = 0;
		$avg_hari = 0;

		$data = $this->db->get_where('tbl_riwayat_tagihan', ['fk_kd_invoice' => $key])->result_array();
		$arr = array();
		$tagihan = array();
		$limit = array();

		foreach ($data as $key => $dt) {
			$row = array();

			$avg_bln += $dt['avg_tagihan_bln'] / count($data);
			$avg_hari += $dt['avg_tagihan_hari'] / count($data) / 30;

			$row[] = '<tr>';
			$row[] = '<td>' . ($key + 1) . '</td>';
			$row[] = '<td>' . $dt['nm_pemberi_kerja'] . '</td>';
			$row[] = '<td>' . $dt['nm_pekerjaan'] . '</td>';
			$row[] = '<td>' . $dt['periode_pekerjaan'] . '</td>';
			$row[] = '<td>Rp. ' . number_format($dt['avg_tagihan_bln'], 2, ',', '.') . '</td>';
			$row[] = '<td>' . $dt['periode_tagihan'] . '</td>';
			$row[] = '<td>' . $dt['avg_tagihan_hari'] . ' Hari</td>';
			$row[] = '<td>' . $dt['rek_tagihan'] . '</td>';
			$row[] = '</tr>';

			$tagihan[] = $row;
		}

		$limit[] = $avg_bln * ceil($avg_hari);
		$limit[] = '<tr><th>Rata-rata Tagihan per bulan</th><td>Rp. ' . number_format($avg_bln, 2, ',', '.') . '</td></tr>';
		$limit[] = '<tr><th>Rata-rata Hari Tagihan</th><td>' . ceil($avg_hari) . ' Hari</td></tr>';
		$limit[] = '<tr><th>Maksimal Limit Wa`ad</th><td>Rp. ' . number_format($avg_bln * ceil($avg_hari), 2, ',', '.') . '</td></tr>';
		$limit[] = '<tr><th>Usulan Wa`ad</th><td><input type="text" class="form-control" id="maks_waad" name="maks_waad" autofocus onkeypress="return CheckNumeric()"></td></tr>';
		$limit[] = '<tr><th>&nbsp;</th><td><button type="submit" class="btn btn-primary">Submit</button></td></tr>';

		$arr['tagihan'] = $tagihan;
		$arr['limit'] = $limit;

		echo json_encode($arr);
		exit;
	}

	public function submit_waad()
	{
		$this->db->update('tbl_list_pembiayaan', ['status' => 'Analisa aspek agunan', 'usulan_waad' => input('max_waad')], ['kd_invoice' => input('kd_invoice')]);
		echo json_encode(['status' => true]);
		exit;
	}

	public function proses_analisa()
	{
		$data = array();
		$arr = array();

		$agunan = $this->input->post('data_agunan');
		$nilai = $this->input->post('nilai_pasar');

		foreach ($agunan as $key => $val) {
			$row = array();

			$row['nama_agunan'] = $val;
			$row['nilai_pasar'] = $nilai[$key];

			$arr[] = $row;
		}

		$data['agunan'] = $arr;

		$analisa = array(
			'fk_kd_invoice' => input('kd_invoice'),
			'total_agunan' => (int) filter_var(input('sum_agunan'), FILTER_SANITIZE_NUMBER_INT),
			'os_eksisting' => (int) filter_var(input('os_eksisting'), FILTER_SANITIZE_NUMBER_INT),
			'tambahan_pembiayaan' => (int) filter_var(input('tambah_pembiayaan'), FILTER_SANITIZE_NUMBER_INT),
			'total_exposure' => (int) filter_var(input('sum_exposure'), FILTER_SANITIZE_NUMBER_INT),
			'fixed_asset' => str_replace(' %', '', input('fixed_asset'))
		);

		$this->db->trans_start();
		for ($i = 0; $i < count($data['agunan']); $i++) {
			$this->db->insert(
				'tbl_agunan',
				array(
					'fk_kd_invoice' => input('kd_invoice'),
					'data_agunan' => $data['agunan'][$i]['nama_agunan'],
					'nilai_pasar' => $data['agunan'][$i]['nilai_pasar']
				)
			);
		}

		$this->db->insert('tbl_analisa_agunan', $analisa);

		$this->db->update('tbl_list_pembiayaan', ['status' => 'Proses usulan pembiayaan'], ['kd_invoice' => input('kd_invoice')]);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$msg = array(
				'status' => false,
				'msg' => array(
					'title' => 'Kesalahan!',
					'icon' => 'warning',
					'text' => 'Analisa aspek agunan gagal disimpan.'
				)
			);
			$this->session->set_flashdata('msg_agunan', $msg);
			redirect(site_url('sales/finance'));
		} else {
			$msg = array(
				'status' => true,
				'msg' => array(
					'title' => 'Berhasil!',
					'icon' => 'success',
					'text' => 'Analisa aspek agunan telah berhasil disimpan.'
				)
			);
			$this->session->set_flashdata('msg_agunan', $msg);
			redirect(site_url('sales/finance'));
		}
	}

	public function proses_usulan()
	{
		$data = array();
		$arr = array();

		for ($i = 0; $i < count($_POST['nm_biaya']); $i++) {
			$row = array();

			$row['nama'] = $_POST['nm_biaya'][$i];
			$row['nominal'] = $_POST['nom_biaya'][$i];

			$arr[] = $row;
		}

		$data['fk_kd_invoice'] = input('kd_invoice');
		$data['skim_pembiayaan'] = input('skim');
		$data['sifat_pembiayaan'] = input('sifat_pembiayaan');
		$data['tujuan_pembiayaan'] = input('tujuan_pembiayaan');
		$data['nom_ujrah'] = input('ujrah_pembiayaan');
		$data['tenor_waad'] = input('tenor_waad');
		$data['jk_penarikan'] = input('jk_penarikan');
		$data['cara_pencairan'] = input('cara_penarikan');
		$data['sumber_pelunasan'] = input('sumber_dana');
		$data['biaya_admin'] = input('biaya_admin');
		$data['biaya_penjamin'] = input('biaya_asuransi');
		$data['biaya_lain'] = serialize($arr);

		$this->db->insert('tbl_usulan', $data);
		$this->db->update('tbl_list_pembiayaan', ['status' => 'Input syarat pembiayaan'], ['kd_invoice' => input('kd_invoice')]);

		echo json_encode(['status' => true, 'msg' => 'Analisa & usulan pembiayaan berhasil disimpan']);
		exit;
	}

	public function proses_syarat()
	{
		$data = array();
		$akad = array();
		$cair = array();
		$lain = array();

		$data['fk_kd_invoice'] = input('kd_invoice');
		for ($i = 0; $i < count($_POST['syarat_akad']); $i++) {
			$akad[] = $_POST['syarat_akad'][$i];
		}
		$data['syarat_akad'] = serialize($akad);

		for ($i = 0; $i < count($_POST['syarat_cair']); $i++) {
			$cair[] = $_POST['syarat_cair'][$i];
		}
		$data['syarat_cair'] = serialize($cair);
		
		for ($i = 0; $i < count($_POST['syarat_lain']); $i++) {
			$lain[] = $_POST['syarat_lain'][$i];
		}
		$data['syarat_lain'] = serialize($lain);

		$this->db->insert('tbl_syarat', $data);
		$this->db->update('tbl_list_pembiayaan', ['status' => 'Proses komite'], ['kd_invoice' => input('kd_invoice')]);

		echo json_encode(['status' => true, 'msg' => 'Syarat pembiayaan berhasil disimpan']);
		exit;
	}


	public function template()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Nama Pemberi Pekerjaan');
		$sheet->setCellValue('B1', 'Nama Pekerjaan');
		$sheet->setCellValue('C1', 'Periode Pekerjaan');
		$sheet->setCellValue('D1', 'Avg. Tagihan per bulan');
		$sheet->setCellValue('E1', 'Periode Tagihan');
		$sheet->setCellValue('F1', 'Avg. Hari Tagihan');
		$sheet->setCellValue('G1', 'Rekening Tagihan');

		$sheet->setCellValue('A2', 'PT Jalan Raya');
		$sheet->setCellValue('B2', 'Penambahan Sparator Busway');
		$sheet->setCellValue('C2', 'Jan-19 s/d Des-19');
		$sheet->setCellValue('D2', '5000000');
		$sheet->setCellValue('E2', 'Jan-19 s/d Des-19');
		$sheet->setCellValue('F2', '15');
		$sheet->setCellValue('G2', '7121001239');

		$sheet->setCellValue('A3', 'PT Jalan Raya');
		$sheet->setCellValue('B3', 'Penambahan Sparator Busway');
		$sheet->setCellValue('C3', 'Jan-19 s/d Des-19');
		$sheet->setCellValue('D3', '5000000');
		$sheet->setCellValue('E3', 'Jan-19 s/d Des-19');
		$sheet->setCellValue('F3', '10');
		$sheet->setCellValue('G3', '7121001239');

		$writer = new Xlsx($spreadsheet);

		$filename = 'template-riwayat-tagihan'; // set filename for excel file to be exported

		header('Content-Type: application/vnd.ms-excel'); // generate excel file
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');	// download file 
	}

	public function import()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$status = true;
		$kd_invoice = input('invoice_upl');

		if (isset($_FILES['upd_file']['name']) && in_array($_FILES['upd_file']['type'], $file_mimes)) {
			$arr_file = explode('.', $_FILES['upd_file']['name']);
			$extension = end($arr_file);

			if ('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['upd_file']['tmp_name']);

			$sheetData = $spreadsheet->getActiveSheet()->toArray();

			$data = array();
			for ($i = 1; $i < count($sheetData); $i++) {
				$data['fk_kd_invoice'] = $kd_invoice;

				if ($sheetData[$i][0] == '') {
					$status = false;
				} else {
					$data['nm_pemberi_kerja'] = $sheetData[$i][0];
				}

				if ($sheetData[$i][1] == '') {
					$status = false;
				} else {
					$data['nm_pekerjaan'] = $sheetData[$i][1];
				}

				if ($sheetData[$i][2] == '') {
					$status = false;
				} else {
					$data['periode_pekerjaan'] = $sheetData[$i][2];
				}

				if ($sheetData[$i][3] == '' || !preg_match('/^[0-9]+$/', $sheetData[$i][3])) {
					$status = false;
				} else {
					$data['avg_tagihan_bln'] = $sheetData[$i][3];
				}

				if ($sheetData[$i][4] == '') {
					$status = false;
				} else {
					$data['periode_tagihan'] = $sheetData[$i][4];
				}

				if ($sheetData[$i][5] == '' || !preg_match('/^[0-9]+$/', $sheetData[$i][5])) {
					$status = false;
				} else {
					$data['avg_tagihan_hari'] = $sheetData[$i][5];
				}

				if ($sheetData[$i][6] == '' || !preg_match('/^[0-9]+$/', $sheetData[$i][6])) {
					$status = false;
				} else {
					$data['rek_tagihan'] = $sheetData[$i][6];
				}

				if ($status === false) {
					$this->session->set_flashdata('upd_err', 'Terjadi kesalahan saat proses upload, periksa kembali data file upload Anda!');
				} else {
					$this->db->insert('tbl_riwayat_tagihan', $data);
					$this->db->update('tbl_list_pembiayaan', ['status' => 'Perhitungan limit wa`ad'], ['kd_invoice' => $kd_invoice]);
					$this->session->set_flashdata('upd_msg', 'Anda telah berhasil upload ' . $i . ' daftar tagihan!');
				}
			}
		} else {
			$this->session->set_flashdata('upd_err', 'Format file invalid!');
		}
		redirect(site_url('sales/finance'));
	}
}
