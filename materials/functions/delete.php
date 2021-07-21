<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/delete.php";
	date_default_timezone_set('Asia/Manila');
	$mat_id = $_POST['id'];
	$sql = "SELECT * FROM MATERIAL WHERE mat_id = '$mat_id'";
	$result = $conn->query($sql);
	$material = $result->fetch_assoc();
	delete($conn, "MATERIAL", "mat_id", $mat_id);
	//initialization of the information for the CHANGES table
	$change_info = [
		"staff_id" => $_SESSION["staff_id"],
		"mat_id" => $mat_id,
		"change_type" => "delet",
		"change_date" => date("Y-m-d H:i:s"),
		"change_prev_info" => json_encode($material)
	];
	add($conn, "CHANGES", $change_info);	//add the information to the CHANGES table
	echo json_encode("Deleted Successfully");
?>