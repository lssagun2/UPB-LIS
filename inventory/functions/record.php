<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	date_default_timezone_set('Asia/Manila');

	if (isset($_POST["acc_num"])){
	$year = date("Y");
	$mat_acc_num = trim($_POST["acc_num"]);
	$sql = "SELECT * FROM MATERIAL WHERE mat_acc_num = '$mat_acc_num'";
	$result = $conn->query($sql);
	$data = []; //changes


	if($result->num_rows != 0){
		$row = $result->fetch_assoc();
		$mat_id = $row['mat_id'];
		$data["info"] = $row;
	}
	else{
		//error handling
	}
	$inv_info = [
				'mat_acc_id' => $row['mat_id'],
				"inv_$year" => 1,
				"date_$year" => date("Y-m-d H:i:s"),
				"staff_id_$year" => $_SESSION["staff_id"]
	];
	$info=[
				"mat_acc_num" => trim($_POST['acc_num']),
			 	"mat_barcode" => trim($_POST['barcode']),
			 	"mat_call_num" => trim($_POST['call_number']),
			 	"mat_title" => trim($_POST['title']),
			 	"mat_author" => trim($_POST['author']),
			 	"mat_volume" => trim($_POST['volume']),  
			 	"mat_year" => trim($_POST['year']), 
			 	"mat_edition" => trim($_POST['edition']), 
			 	"mat_publisher" => trim($_POST['publisher']),
			 	"mat_pub_year" => trim($_POST['pub_year']),
			 	"mat_circ_type" => trim($_POST['circ_type']),
			 	"mat_type" => trim($_POST['type']),
			 	"mat_status" => trim($_POST['status']),
			 	"mat_source" => trim($_POST['source']), 
			 	"mat_location" => trim($_POST['location']),
			 	"mat_lastinv_year" => $year
	];
	$change_info = [
				"staff_id" => $_SESSION["staff_id"],
				"mat_id" => trim($_POST['id']),
				"change_type" => "edit",
				"change_date" => date("Y-m-d H:i:s"),
				"change_prev_info" => json_encode($row)
	];

	add($conn, "INVENTORY", $inv_info);
	edit($conn, "INVENTORY", $mat_id, $inv_info);
	edit($conn, "MATERIAL", $mat_id, $info);
	add($conn, "CHANGES", $change_info);

	$data["success"] = true;
	echo json_encode($data);


	
	}
?>