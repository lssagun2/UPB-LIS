<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	date_default_timezone_set('Asia/Manila');
	$year = date("Y");
	$mat_acc_num = $_POST["acc_num"];
	$sql = "SELECT mat_id FROM INVENTORY WHERE mat_acc_num = '$mat_acc_num'";
	$result = $conn->query($sql);
	if($result->num_rows != 0){
		$row = $result->fetch_assoc();
		$mat_id = $row["mat_id"];
	}
	else{
		//error handling
	}
	$inv_info = [
		"inv_$year" => 1,
		"date_$year" => date("Y-m-d H:i:s"),
		"staff_id_$year" => $_SESSION["staff_id"]
	];
	edit($conn, "INVENTORY", $mat_id, $inv_info);
	$update_info = [
		"mat_lastinv_year" => $year
	];
	edit($conn, "MATERIAL", $mat_id, $update_info);
	$data["success"] = true;
	echo json_encode($data);
?>