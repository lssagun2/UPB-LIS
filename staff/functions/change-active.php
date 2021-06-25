<?php
	//Function for reactivating/deactivating staff accounts.
	session_start();
	$data = [];
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	date_default_timezone_set('Asia/Manila');
	//Updates staff_active status.
	$primaryKey = trim($_POST['primaryKey']);
	$sql = "UPDATE STAFF SET";
	if($_POST['change-active-function'] == "delete"){
		$sql .= ' staff_active = 0';
	}
	if($_POST['change-active-function'] == "restore"){
		$sql .= ' staff_active = 1';
	}
	//SQL query for editing active-status of a user.
	$sql .= " WHERE staff_id = '$primaryKey'";
	$result = $conn->query($sql);
	$data['success'] = true;
	echo json_encode($data)
?>

