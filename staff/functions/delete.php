<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	date_default_timezone_set('Asia/Manila');

	$primaryKey = trim($_POST['primaryKey']);
	$sql = "DELETE FROM staff WHERE staff_id = '$primaryKey'";
	$result = $conn->query($sql);
	$data['success'] = true;
	$data['primaryKey'] = $primaryKey;
	echo json_encode($data);
?>

