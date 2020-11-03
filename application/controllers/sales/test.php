<?php
if (isset($_POST['add'])) {
	$m = $m;
	$Y = $Y;
	$id_name        = explode(' - ', $_POST['id_name']);
	$employee_id    = $id_name[0];
	$employee_name  = $id_name[1];
	$workday = $_POST['workday'];
	$sick_leave = $_POST['sick_leave'];
	$overtime_wd = $_POST['overtime_wd'];
	$overtime_od = $_POST['overtime_od'];

	for ($i = 0; $i < count($_POST['id_name']); $i++) {
		$exp = explode(' - ', $_POST['id_name'][$i]);

		$data = array(
			'm' => $m,
			'Y' => $Y,
			'employee_id' => $exp[0],
			'workday' => $_POST['workday'][$i],
			'sick_leave' => $_POST['sick_leave'][$i],
			'overtime_wd' => $_POST['overtime_wd'][$i],
			'overtime_od' => $_POST['overtime_od'][$i]
		);

		$sql = "insert into tbl_payroll set ";
		foreach ($data as $key => $val) {
			$sql += $key . " = '" . $val . "', ";
		}

		if ($connection->query(substr($sql, 0, -2))) {
			$_SESSION['success'] = 'Data Time Management / Month added successfully';
		} else {
			$_SESSION['error'] = $connection->error;
		}
	}
} else {
	$_SESSION['error'] = 'Fill up add form first';
}
?>
