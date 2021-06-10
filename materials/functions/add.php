<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/validateMaterial.php";
	date_default_timezone_set('Asia/Manila');
	$data = [];
	$initialInfo = [
		'mat_acc_num' => '',
		'mat_barcode' => ''
	];
	//initialize the material information into an associative array
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
	 	"mat_location" => trim($_POST['location']),
	 	"mat_inv_num" => trim($_POST['inv_num']),
	 	"mat_source" => trim($_POST['source']),
	 	"mat_lastinv_year" => trim($_POST['last_year_inventoried'])
	];
	$errors = validateMaterial($conn, $info, $initialInfo);	//check for errors in the material information
	if(!empty($errors)){ 				//there are errors in the input
		$data['success'] = false;
		$data['errors'] = $errors;
	}
	else{								//there are no errors in the input
		if(preg_match('/[a-zA-Z]{1,8}-[0-9]{1,8}$/i', $info['mat_acc_num'])){	//checks if format of accession number is <letters>-<numbers>
	 		$accession_number = explode("-", $info['mat_acc_num']);
	 		$info['mat_acc_num1'] = $accession_number[0];
	 		$info['mat_acc_num2'] = $accession_number[1];
	 	}
		$call_number = explode(" ", $info['mat_call_num']);
		$info['mat_call_num1'] = array_shift($call_number);
		$call_num_column2 = array_shift($call_number);
		if(is_numeric($call_num_column2)){	//checks if second column of call number is a number
			$info['mat_call_num2'] = $call_num_column2;
			$info['mat_call_num3'] = implode(" ", $call_number);
		}
		add($conn, "MATERIAL", $info);
		$insert_id = $conn->insert_id;
		$year = date("Y");
		//initialization of the information for the INVENTORY table
		$inv_info = [
			"mat_id" => $insert_id,
			"inv_$year" => 1,
			"date_$year" => date("Y-m-d H:i:s"),
			"staff_id_$year" => $_SESSION["staff_id"]
		];
		
		$sql = "SHOW COLUMNS FROM INVENTORY WHERE field LIKE 'inv_%' and field < 'inv_$year'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$inv_info[$row["Field"]] = -1;		//indicates that the material does not exist in prior years
		}
		add($conn, "INVENTORY", $inv_info);		//add the information to the INVENTORY table
		//initialization of the information for the CHANGES table
		$change_info = [
		"staff_id" => $_SESSION["staff_id"],
		"mat_id" => $insert_id,
		"change_type" => "add",
		"change_date" => date("Y-m-d H:i:s"),
		"change_prev_info" => NULL
		];
		add($conn, "CHANGES", $change_info);	//add the information to the CHANGES table
		$data["success"] = true;
		$data["message"] = "The entry was created succesfully.";
	}
	
	echo json_encode($data);
?>

