<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
	}

	private function validate()
	{
		$data = array();
		$data['inputerror'] = array();
		$data['error'] = array();
		$data['status'] = true;

		$url = explode('_', $this->uri->segment(3));

		if ($url[1] == 'region') {
			if (input('kd_region') == '') {
				$data['inputerror'][] = 'kd_region';
				$data['error'][] = 'Kode region harus diisi';
				$data['status'] = false;
			} else if (!preg_match('/^[0-9]+$/', input('kd_region'))) {
				$data['inputerror'][] = 'kd_region';
				$data['error'][] = 'Kode region tidak valid, harus numberic';
				$data['status'] = false;
			}

			if (input('nm_region') == '') {
				$data['inputerror'][] = 'nm_region';
				$data['error'][] = 'Nama region harus diisi';
				$data['status'] = false;
			} else if (!preg_match('/^[A-Z ]+$/', strtoupper(input('nm_region')))) {
				$data['inputerror'][] = 'nm_region';
				$data['error'][] = 'Nama region tidak valid, harus alphabet';
				$data['status'] = false;
			}
		} else if ($url[1] == 'area') {
			if (input('kd_area') == '') {
				$data['inputerror'][] = 'kd_area';
				$data['error'][] = 'Kode area harus diisi';
				$data['status'] = false;
			} else if (!preg_match('/^[0-9]+$/', input('kd_area'))) {
				$data['inputerror'][] = 'kd_area';
				$data['error'][] = 'Kode area tidak valid, harus numberic';
				$data['status'] = false;
			}

			if (input('nm_area') == '') {
				$data['inputerror'][] = 'nm_area';
				$data['error'][] = 'Nama area harus diisi';
				$data['status'] = false;
			} else if (!preg_match('/^[A-Z ]+$/', strtoupper(input('nm_area')))) {
				$data['inputerror'][] = 'nm_area';
				$data['error'][] = 'Nama area tidak valid, harus alphabet';
				$data['status'] = false;
			}

			$cmb = array('li_region');
			foreach ($cmb as $cmb) {
				if (input($cmb) == '') {
					$data['inputerror'][] = $cmb;
					$data['error'][] = 'List belum terpilih';
					$data['status'] = false;
				}
			}
		} else {
			if (input('kd_cabang') == '') {
				$data['inputerror'][] = 'kd_cabang';
				$data['error'][] = 'Kode cabang harus diisi';
				$data['status'] = false;
			} else if (!preg_match('/^[0-9]+$/', input('kd_cabang'))) {
				$data['inputerror'][] = 'kd_cabang';
				$data['error'][] = 'Kode cabang tidak valid, harus numberic';
				$data['status'] = false;
			}

			$cmb = array('li_region', 'li_area');
			foreach ($cmb as $cmb) {
				if (input($cmb) == '') {
					$data['inputerror'][] = $cmb;
					$data['error'][] = 'List belum terpilih';
					$data['status'] = false;
				}
			}

			if (input('nm_cabang') == '') {
				$data['inputerror'][] = 'nm_cabang';
				$data['error'][] = 'Nama cabang harus diisi';
				$data['status'] = false;
			} else if (!preg_match('/^[A-Z ]+$/', strtoupper(input('nm_cabang')))) {
				$data['inputerror'][] = 'nm_cabang';
				$data['error'][] = 'Nama cabang tidak valid, harus alphabet';
				$data['status'] = false;
			}
		}

		if ($data['status'] === false) {
			echo json_encode($data);
			exit();
		}
	}

	// module region
	public function region()
	{
		$data = array(
			'page' => 'admin/outlet/v_region',
			'title' => '<i class="fa fa-building"></i> Daftar Region',
			'data' => $this->db->get_where('tbl_region', ['IsDelete' => 0])->result_array()
		);

		$this->load->view('layout/content', $data);
	}

	public function save_region()
	{
		$this->validate();

		$data = array(
			'kd_region' => 'ID' . input('kd_region'),
			'nm_region' => strtoupper(input('nm_region'))
		);

		$this->db->insert('tbl_region', $data);

		$msg = array(
			'status' => true,
			'icon' => 'success',
			'msg' => 'Data cabang telah berhasil disimpan!'
		);

		echo json_encode($msg);
		exit;
	}

	public function edit_region($id)
	{
		$data = $this->db->get_where('tbl_region', ['id' => $id])->row_array();

		echo json_encode($data);
		exit;
	}

	public function update_region()
	{
		$this->validate();

		$data = array(
			'kd_region' => 'ID' . input('kd_region'),
			'nm_region' => strtoupper(input('nm_region')),
			'UpdateBy' => $this->session->userdata('nip'),
			'UpdateDate' => date('Y-m-d H:i:s')
		);

		$this->db->update('tbl_region', $data, ['id' => input('id')]);
		$msg = array(
			'status' => true,
			'icon' => 'success',
			'msg' => 'Data cabang telah berhasil diubah!'
		);

		echo json_encode($msg);
		exit;
	}

	public function delete_region($id)
	{
		$this->db->trans_begin();

		$this->db->update('tbl_region', ['IsDelete' => 1], ['id' => $id]);
		$this->db->update('tbl_area', ['IsDelete' => 1], ['id_region' => $id]);
		$this->db->update('tbl_cabang', ['IsDelete' => 1], ['region' => $id]);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();

			$msg = array(
				'icon' => 'error',
				'msg' => 'Data telah gagal dihapus!'
			);
		} else {
			$this->db->trans_commit();

			$msg = array(
				'icon' => 'success',
				'msg' => 'Data telah berhasil dihapus!'
			);
		}

		echo json_encode($msg);
		exit;
	}


	// module area
	public function area()
	{
		$area = $this->db->select('a.*, b.nm_region')->from('tbl_area a')->join('tbl_region b', 'a.id_region = b.id', 'left')->where(['a.IsDelete' => 0])->order_by('b.id', 'asc')->get()->result_array();

		$data = array(
			'page' => 'admin/outlet/v_area',
			'title' => '<i class="fa fa-building"></i> Daftar Outlet Area',
			'data' => $area
		);

		$this->load->view('layout/content', $data);
	}

	public function save_area()
	{
		$this->validate();

		$data = array(
			'kd_area' => 'ID' . input('kd_area') . 'a',
			'nm_area' => strtoupper(input('nm_area')),
			'id_region' => input('li_region')
		);

		$this->db->insert('tbl_area', $data);

		$msg = array(
			'status' => true,
			'icon' => 'success',
			'msg' => 'Data cabang telah berhasil disimpan!'
		);

		echo json_encode($msg);
		exit;
	}

	public function edit_area($id)
	{
		$data = $this->db->get_where('tbl_area', ['id' => $id])->row_array();

		echo json_encode($data);
		exit;
	}

	public function update_area()
	{
		$this->validate();

		$data = array(
			'kd_area' => 'ID' . input('kd_area') . 'a',
			'nm_area' => strtoupper(input('nm_area')),
			'id_region' => input('li_region'),
			'UpdateBy' => $this->session->userdata('nip'),
			'UpdateDate' => date('Y-m-d H:i:s')
		);

		$this->db->update('tbl_area', $data, ['id' => input('id')]);
		$msg = array(
			'status' => true,
			'icon' => 'success',
			'msg' => 'Data cabang telah berhasil diubah!'
		);

		echo json_encode($msg);
		exit;
	}

	public function delete_area($id)
	{
		$this->db->trans_begin();

		$this->db->update('tbl_area', ['IsDelete' => 1], ['id' => $id]);
		$this->db->update('tbl_cabang', ['IsDelete' => 1], ['area' => input('kd_area')]);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();

			$msg = array(
				'icon' => 'error',
				'msg' => 'Data telah gagal dihapus!'
			);
		} else {
			$this->db->trans_commit();

			$msg = array(
				'icon' => 'success',
				'msg' => 'Data telah berhasil dihapus!'
			);
		}

		echo json_encode($msg);
		exit;
	}


	// module cabang
	public function cabang()
	{
		$cabang = $this->db->select('a.*, b.nm_area, c.nm_region')->from('tbl_cabang a')
			->join('tbl_area b', 'a.area = b.kd_area', 'left')
			->join('tbl_region c', 'a.region = c.id', 'left')
			->where(['a.IsDelete' => 0])->order_by('c.id', 'asc')
			->get()->result_array();

		$data = array(
			'page' => 'admin/outlet/v_cabang',
			'title' => '<i class="fa fa-building"></i> Daftar Outlet Cabang',
			'data' => $cabang
		);

		$this->load->view('layout/content', $data);
	}

	public function save_cabang()
	{
		$this->validate();

		$data = array(
			'kd_cabang' => 'ID' . input('kd_cabang'),
			'nm_cabang' => strtoupper(input('nm_cabang')),
			'region' => input('li_region'),
			'area' => input('li_area')
		);

		$this->db->insert('tbl_cabang', $data);

		$msg = array(
			'status' => true,
			'icon' => 'success',
			'msg' => 'Data cabang telah berhasil disimpan!'
		);

		echo json_encode($msg);
		exit;
	}

	public function edit_cabang($id)
	{
		$data = $this->db->select('a.*, b.nm_area, c.nm_region')->from('tbl_cabang a')
			->join('tbl_area b', 'a.area = b.kd_area', 'left')
			->join('tbl_region c', 'a.region = c.id', 'left')
			->where(['a.id' => $id])->order_by('c.id', 'asc')
			->get()->row_array();

		echo json_encode($data);
		exit;
	}

	public function update_cabang()
	{
		$this->validate();

		$data = array(
			'kd_cabang' => 'ID' . input('kd_cabang'),
			'nm_cabang' => strtoupper(input('nm_cabang')),
			'region' => input('li_region'),
			'area' => input('li_area'),
			'UpdateBy' => $this->session->userdata('nip'),
			'UpdateDate' => date('Y-m-d H:i:s')
		);

		$this->db->update('tbl_cabang', $data, ['id' => input('id')]);
		$msg = array(
			'status' => true,
			'icon' => 'success',
			'msg' => 'Data cabang telah berhasil diubah!'
		);

		echo json_encode($msg);
		exit;
	}

	public function delete_cabang($id)
	{
		$cek = $this->db->get_where('tbl_cabang', ['id' => $id])->row_array();
		$this->db->trans_begin();

		$this->db->update('tbl_region', ['IsDelete' => 1], ['id' => $cek['region']]);
		$this->db->update('tbl_area', ['IsDelete' => 1], ['kd_area' => $cek['area']]);
		$this->db->update('tbl_cabang', ['IsDelete' => 1], ['id' => $id]);

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();

			$msg = array(
				'icon' => 'error',
				'msg' => 'Data telah gagal dihapus!'
			);
		} else {
			$this->db->trans_commit();

			$msg = array(
				'icon' => 'success',
				'msg' => 'Data telah berhasil dihapus!'
			);
		}

		echo json_encode($msg);
		exit;
	}
}
