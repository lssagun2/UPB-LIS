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
	 	"mat_edition" => trim($_POST['edition']), 
	 	"mat_publisher" => trim($_POST['publisher']),
	 	"mat_pub_year" => trim($_POST['pub_year']),
	 	"mat_circ_type" => trim($_POST['circ_type']),
	 	"mat_type" => trim($_POST['type']),
	 	"mat_status" => trim($_POST['status']),
	 	"mat_location" => trim($_POST['location']),
	 	"mat_source" => trim($_POST['source']),
	 	"mat_price_currency" => trim($_POST['currency']),
	 	"mat_price_value" => trim($_POST['price']),
	 	"mat_donor" => trim($_POST['donor']),
	 	"acquisition_year" => trim($_POST['acquisition_year']),
	 	"acquisition_month" => trim($_POST['acquisition_month']),
	 	"acquisition_day" => trim($_POST['acquisition_day']),
	 	"mat_supplier" => trim($_POST['supplier']),
	 	"mat_inv_num" => trim($_POST['inv_num']),
	 	"mat_lastinv_year" => trim($_POST['last_year_inventoried']),
	 	"mat_remarks" => trim($_POST['remarks'])
	];
	$errors = validateMaterial($conn, $info, $initialInfo); //check for errors in the material information
	if(!empty($errors)){				//there are errors in the input
		$data['success'] = false;
		$data['errors'] = $errors;	
	}
	else{								//there are no errors in the input
		edit($conn, "MATERIAL", $id, $info);	//edit the material in the database
		$change_info = [
			"staff_id" => $_SESSION["staff_id"],
			"mat_id" => $id,
			"change_type" => "edit",
			"change_date" => date("Y-m-d H:i:s"),
			"change_prev_info" => json_encode($row)
		];
		add($conn, "CHANGES", $change_info);	//record the changes done
		$data["success"] = true;
	}
	
	//Removal of Filtering of $info array 
	echo json_encode($data);

 ?>
