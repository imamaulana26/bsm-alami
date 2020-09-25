<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance_new extends CI_Controller
{
	public function index()
	{
		$data = array(
			'page' => 'sales/v_finance_new',
			'title' => '<i class="fa fa-paste"></i> Daftar Pembiayaan Baru',
			'data' => ''
		);

		$this->load->view('layout/content', $data);
	}
}
