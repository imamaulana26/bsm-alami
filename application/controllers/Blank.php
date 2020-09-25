<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blank extends CI_Controller
{
	public function index()
	{
		$page = 'v_blank';
		$data = array(
			'title' => '404 - Page Not Found',
			'text' => 'The page you are looking for might have been removed had its name changed or is temporarily unavailable.'
		);

		$this->load->view($page, $data);
	}

	public function page_error()
	{
		$page = 'v_blank';
		$data = array(
			'title' => '500 - Something went wrong',
			'text' => 'We will work on fixing that right away. Meanwhile, you may return to dashboard.'
		);

		$this->load->view($page, $data);
	}
}
