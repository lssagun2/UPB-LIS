<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	date_default_timezone_set('Asia/Manila');
	$data = []; //Change
	$info = [
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
	$errors = validateInput($conn, $info, 'MATERIAL'); //Change
	if(!empty($errors)){ //Change entire if else
		$data['success'] = false;
		$data['errors'] = $errors;
	}
	else{	//Change entire if else
		add($conn, "MATERIAL", $info);
		$insert_id = $conn->insert_id;
		$year = date("Y");
		$inv_info = [
			"mat_id" => $insert_id,
			"mat_acc_num" => $_POST['acc_num'],
		 	"mat_barcode" => $_POST['barcode']
			// "inv_$year" => 1,
			// "date_$year" => date("Y-m-d H:i:s"),
			// "staff_id_$year" => $_SESSION["staff_id"]
		];
		
		$sql = "SHOW COLUMNS FROM INVENTORY WHERE field LIKE 'inv_%' and field < 'inv_$year'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$inv_info[$row["Field"]] = -1;
		}
		add($conn, "INVENTORY", $inv_info);
		$change_info = [
		"staff_id" => $_SESSION["staff_id"],
		"mat_id" => $insert_id,
		"change_type" => "add",
		"change_date" => date("Y-m-d H:i:s"),
		"change_prev_info" => NULL
		];
		add($conn, "CHANGES", $change_info);
		$data["success"] = true;
		$data["message"] = "The entry was created succesfully."; //Change
	} //Change entire if else
	
	echo json_encode($data);
?>

