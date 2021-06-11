<?php
	session_start();
	$data = [];
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	date_default_timezone_set('Asia/Manila');

	$primaryKey = trim($_POST['primaryKey']);
	$sql = "UPDATE STAFF SET";
	if($_POST['change-active-function'] == "delete"){
		$sql .= ' staff_active = 0';
	}
	if($_POST['change-active-function'] == "restore"){
		$sql .= ' staff_active = 1';
	}
	$sql .= " WHERE staff_id = '$primaryKey'";
	$result = $conn->query($sql);
	$data['success'] = true;
	echo json_encode($data)
?>

