<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance_proses extends CI_Controller
{
	public function index()
	{
		$data = array(
			'page' => 'sales/v_finance_proses',
			'title' => '<i class="fa fa-paste"></i> Pembiayaan On Progress',
			'data' => ''
		);

		$this->load->view('layout/content', $data);
	}
}
