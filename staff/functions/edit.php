<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	$id = $_POST['staff_id'];
	$sql = "SELECT * FROM STAFF WHERE staff_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$info = [
		"staff_username" => $_POST['staff_username'],
		"staff_firstname" => $_POST['staff_firstname'],
		"staff_lastname" => $_POST['staff_lastname'],
		"staff_password" => $_POST['staff_password'],
	];
	$info = array_filter($info);
	edit($conn, "STAFF", $id, $info);
	$data["success"] = true;
	echo json_encode($data);
 ?>
