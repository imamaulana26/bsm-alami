<?php
defined('BASEPATH') or exit('No direct script access allowed');

$ver = "envi"; // envi or prod or maintenance

switch ($ver) {
	case "maintenance":
		$config = array(
			'version' => '',
			'hostname' => '',
			'username' => '',
			'password' => '',
			'database' => '',
			'dbdriver' => 'mysqli'
		);
		break;
	case "prod":
		$config = array(
			'version' => '',
			'hostname' => '',
			'username' => '',
			'password' => '',
			'database' => '',
			'dbdriver' => 'mysqli'
		);
		break;
	default:
		$config = array(
			'version' => 'envi',
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => 'db_bsm_alami',
			'dbdriver' => 'mysqli'
		);
		break;
}
