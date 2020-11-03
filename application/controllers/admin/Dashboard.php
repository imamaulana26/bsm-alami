<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
	}
	
	public function index()
	{
		$data = array(
			'page' => 'staff/v_dashboard'
		);

		$this->load->view('layout/content', $data);
	}
}
