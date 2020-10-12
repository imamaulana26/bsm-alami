<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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

		$role = explode('-', input('role'));

		if (input('nip_user') == '') {
			$data['inputerror'][] = 'nip_user';
			$data['error'][] = 'NIP user harus diisi';
			$data['status'] = false;
		} else if (!preg_match('/^[0-9]+$/', input('nip_user'))) {
			$data['inputerror'][] = 'nip_user';
			$data['error'][] = 'NIP user tidak valid, harus numberic';
			$data['status'] = false;
		} else if (strlen(input('nip_user')) != 9) {
			$data['inputerror'][] = 'nip_user';
			$data['error'][] = 'NIP user tidak boleh kurang atau lebih dari 9 digit';
			$data['status'] = false;
		}

		if (input('kode_ao') == '') {
			$data['inputerror'][] = 'kode_ao';
			$data['error'][] = 'Kode AO harus diisi';
			$data['status'] = false;
		} else if (!preg_match('/^[0-9]+$/', input('kode_ao'))) {
			$data['inputerror'][] = 'kode_ao';
			$data['error'][] = 'Kode AO tidak valid, harus numberic';
			$data['status'] = false;
		} else if (strlen(input('kode_ao')) != 8) {
			$data['inputerror'][] = 'kode_ao';
			$data['error'][] = 'Kode AO tidak boleh kurang atau lebih dari 8 digit';
			$data['status'] = false;
		}

		if (input('nama_user') == '') {
			$data['inputerror'][] = 'nama_user';
			$data['error'][] = 'Nama lengkap harus diisi';
			$data['status'] = false;
		} else if (!preg_match('/^[A-Z. ]+$/', strtoupper(input('nama_user')))) {
			$data['inputerror'][] = 'nama_user';
			$data['error'][] = 'Nama lengkap tidak valid, harus alphabet';
			$data['status'] = false;
		}

		if (input('email_user') == '') {
			$data['inputerror'][] = 'email_user';
			$data['error'][] = 'Email harus diisi';
			$data['status'] = false;
		} else if (!preg_match('/^[a-z0-9]+$/', input('email_user'))) {
			$data['inputerror'][] = 'email_user';
			$data['error'][] = 'Email tidak valid';
			$data['status'] = false;
		}

		if ($role[1] == 'pusat') {
			$cmb = array('jbtn_user');
		} else {
			$cmb = array('jbtn_user', 'li_region', 'unit_kerja');
		}

		foreach ($cmb as $cmb) {
			if (input($cmb) == '') {
				$data['inputerror'][] = $cmb;
				$data['error'][] = 'List belum terpilih';
				$data['status'] = false;
			}
		}

		if ($data['status'] === false) {
			echo json_encode($data);
			exit();
		}
	}

	public function pusat()
	{
		$user = $this->db->get_where('tbl_user', ['role_id' => 2])->result_array();

		$data = array(
			'page' => 'admin/v_user',
			'title' => '<i class="fa fa-users"></i> Data User Pusat',
			'region' => $this->db->get('tbl_region')->result_array(),
			'user' => $user
		);

		$this->load->view('layout/content', $data);
	}

	public function cabang()
	{
		$this->db->select('*')->from('tbl_user a')
			->join('tbl_area b', 'a.group_unit_kerja = b.kd_area', 'inner')
			->join('tbl_region c', 'b.id_region = c.id', 'left')
			->where(['a.role_id' => 3])->order_by('c.id', 'asc');
		$user = $this->db->get()->result_array();

		$data = array(
			'page' => 'admin/v_user',
			'title' => '<i class="fa fa-users"></i> Data User Cabang',
			'region' => $this->db->get('tbl_region')->result_array(),
			'user' => $user
		);

		$this->load->view('layout/content', $data);
	}

	public function save()
	{
		$this->validate();

		$role = explode('-', input('role'));
		$role_id = $role[1] == 'pusat' ? 2 : 3;
		$outlet = $role[1] == 'pusat' ? 'ID0010001a' : input('unit_kerja');

		$data = array(
			'nip' => input('nip_user'),
			'nama' => strtoupper(input('nama_user')),
			'email' => input('email_user') . '@bsm.co.id',
			'jabatan' => input('jbtn_user'),
			'unit_kerja' => $outlet,
			'group_unit_kerja' => $outlet,
			'password' => md5(input('nip_user')),
			'role_id' => $role_id,
			'status' => 0,
			'sts_regis' => 0,
			'is_active' => 0,
			'date_created' => date('Y-m-d'),
			'last_login' => null,
			'IsDelete' => 0
		);

		$this->db->insert('tbl_user', $data);
		$cek = $this->db->get_where('tbl_user', ['nip' => $data['nip']])->num_rows();
		if ($cek > 0) {
			$msg = array(
				'status' => true,
				'icon' => 'success',
				'msg' => 'Data user telah berhasil disimpan!'
			);
		} else {
			$msg = array(
				'status' => false,
				'icon' => 'danger',
				'msg' => 'Data user gagal disimpan!'
			);
		}

		echo json_encode($msg);
		exit;
	}

	public function edit($id)
	{
		$cek = $this->db->get_where('tbl_user', ['nip' => $id])->row_array();
		if ($cek['role_id'] == 3) {
			$this->db->select('*')->from('tbl_user a')
				->join('tbl_area b', 'a.group_unit_kerja = b.kd_area', 'inner')
				->join('tbl_region c', 'b.id_region = c.id', 'left')
				->where(['a.nip' => $id]);
			$data = $this->db->get()->row_array();
		} else {
			$data = $cek;
		}


		echo json_encode($data);
		exit;
	}

	public function update()
	{
		$this->validate();

		$role = explode('-', input('role'));
		$outlet = $role[1] == 'pusat' ? 'ID0010001a' : input('unit_kerja');

		$data = array(
			'nama' => strtoupper(input('nama_user')),
			'email' => input('email_user') . '@bsm.co.id',
			'jabatan' => input('jbtn_user'),
			'unit_kerja' => $outlet,
			'group_unit_kerja' => $outlet,
			'UpdateBy' => $this->session->userdata('nip'),
			'UpdateDate' => date('Y-m-d')
		);

		$this->db->update('tbl_user', $data, ['nip' => input('nip_user')]);
		$msg = array(
			'status' => true,
			'icon' => 'success',
			'msg' => 'Data user telah berhasil diubah!'
		);

		echo json_encode($msg);
		exit;
	}

	public function delete($id)
	{
		$cek = $this->db->get_where('tbl_user', ['nip' => $id])->row_array();
		if ($cek > 0) {
			$this->db->delete('tbl_user', ['nip' => $id]);

			$msg = array(
				'icon' => 'success',
				'msg' => 'Data telah berhasil dihapus!'
			);
		} else {
			$msg = array(
				'icon' => 'danger',
				'msg' => 'Data gagal dihapus!'
			);
		}

		echo json_encode($msg);
		exit;
	}
}
