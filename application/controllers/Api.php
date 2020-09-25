<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function area()
	{
		$data = $this->db->get('tbl_area')->result_array();

		echo json_encode($data);
		exit;
	}

	public function region()
	{
		$data = $this->db->get('tbl_region')->result_array();

		echo json_encode($data);
		exit;
	}

	public function get_area($key)
	{
		$data = $this->db->get_where('tbl_area', ['id_region' => $key])->result_array();

		echo json_encode($data);
		exit;
	}
}
