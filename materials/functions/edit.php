<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/validateMaterial.php";
	date_default_timezone_set('Asia/Manila');

	$id = $_POST['id'];
	$sql = "SELECT * FROM MATERIAL WHERE mat_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$data = [];
	//initialize the initial information of the material into an array
	$initialInfo = [
		'mat_acc_num' => $row['mat_acc_num'],
		'mat_barcode' => $row['mat_barcode']
	];
	//initialize the information of the material into an array
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
	$errors = validateMaterial($conn, $info, $initialInfo); //check for errors in the material information
	if(!empty($errors)){				//there are errors in the input
		$data['success'] = false;
		$data['errors'] = $errors;	
	}
	else{								//there are no errors in the input
		if(preg_match('/[a-zA-Z]{1,8}-[0-9]{1,8}$/i', $info['mat_acc_num'])){	//checks if format of accession number is <letters>-<numbers>
	 		$accession_number = explode("-", $info['mat_acc_num']);
	 		$info['mat_acc_num1'] = $accession_number[0];
	 		$info['mat_acc_num2'] = $accession_number[1];
	 	}
	 	else{
	 		$info['mat_acc_num1'] = $info['mat_acc_num'];
	 		$info['mat_acc_num2'] = "";
	 	}
		$call_number = explode(" ", $info['mat_call_num']);
		$info['mat_call_num1'] = array_shift($call_number);
		$call_num_column2 = array_shift($call_number);
		if(is_numeric($call_num_column2)){	//checks if second column of call number is a number
			$info['mat_call_num2'] = $call_num_column2;
			$info['mat_call_num3'] = implode(" ", $call_number);
		}
		else{
			$info['mat_call_num2'] = "";
			$info['mat_call_num3'] = "";
		}
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
