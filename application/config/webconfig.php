<?php
defined('BASEPATH') or exit('No direct script access allowed');

$ver = "envi"; // envi or prod or maintenance

switch ($ver) {
	case "maintenance":
		$config = array(
			'version' => 'maintenance',
			'hostname' => 'localhost',
			'username' => 'u6020540_root',
			'password' => 'maulana26',
			'database' => 'u6020540_db_alami',
			'dbdriver' => 'mysqli'
		);
		break;
	case "prod":
		$config = array(
			'version' => 'prod',
			'hostname' => 'localhost',
			'username' => 'u6020540_root',
			'password' => 'maulana26',
			'database' => 'u6020540_db_alami',
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
