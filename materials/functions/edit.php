<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	date_default_timezone_set('Asia/Manila');

	$id = $_POST['id'];
	$sql = "SELECT * FROM MATERIAL WHERE mat_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$data = []; //changes

			$initialInfo = [ //Changes
				'mat_acc_num' => $row['mat_acc_num'],
				'mat_barcode' => $row['mat_barcode'],
				'mat_call_num' => $row['mat_call_num']
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
			 	"mat_lastinv_year" => trim($_POST['last_year_inventoried'])
			 ];
	$errors = validateInputforEdit($conn, $info, $initialInfo, "MATERIAL"); //Changes
	if(!empty($errors)){ //Changes
		$data['success'] = false;
		$data['errors'] = $errors;	
	}
	else{ //Changes
		edit($conn, "MATERIAL", $id, $info);
		$change_info = [
			"staff_id" => $_SESSION["staff_id"],
			"mat_id" => $id,
			"change_type" => "edit",
			"change_date" => date("Y-m-d H:i:s"),
			"change_prev_info" => json_encode($row)
		];
		add($conn, "CHANGES", $change_info);
		$data["success"] = true;
	}
	
	//Removal of Filtering of $info array 
	echo json_encode($data);

 ?>
