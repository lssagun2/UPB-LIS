<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	date_default_timezone_set('Asia/Manila');
	$mat_id = $_POST['id'];
	$sql = "SELECT change_prev_info FROM CHANGES WHERE mat_id = '$mat_id' AND change_type = 'delet'";
	$result = $conn->query($sql);
	$info = $result->fetch_assoc();
	$material = json_decode($info['change_prev_info'], true);
	add($conn, "MATERIAL", $material);
	//initialization of the information for the CHANGES table
	$change_info = [
		"staff_id" => $_SESSION["staff_id"],
		"mat_id" => $material['mat_id'],
		"change_type" => "restor",
		"change_date" => date("Y-m-d H:i:s"),
		"change_prev_info" => NULL
	];
	add($conn, "CHANGES", $change_info);	//add the information to the CHANGES table
	echo json_encode("Restored Successfully");
?>