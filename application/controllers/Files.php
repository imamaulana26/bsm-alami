<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Files extends CI_Controller
{
	public function download($key, $file)
	{
		// $this->load->helper('download');
		// $path = 'assets/files/' . $key . '/' . $file;
		// force_download($path, null);

		header("Content-Disposition: attachment; filename=" . basename($file));
		header("Content-Type: application/octet-stream;");
		readfile('assets/files/' . $key . '/' . $file);
	}
}
