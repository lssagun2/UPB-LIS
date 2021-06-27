<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/validateMaterial.php";
	date_default_timezone_set('Asia/Manila');

	//Fetch material information
	$id = $_POST['id'];
	$sql = "SELECT * FROM MATERIAL WHERE mat_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$data = []; 

	$initialInfo = [	//initial information of the material to be edited
		'mat_acc_num' => $row['mat_acc_num'],
		'mat_barcode' => $row['mat_barcode']
	];

	$info = [				//new information input by the user
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
	 	"mat_source" => trim($_POST['source']),
	 	"mat_price_currency" => trim($_POST['currency']),
	 	"mat_price_value" => trim($_POST['price']),
	 	"acquisition_year" => trim($_POST['acquisition_year']),
	 	"acquisition_month" => trim($_POST['acquisition_month']),
	 	"acquisition_day" => trim($_POST['acquisition_day']),
	 	"mat_property_inv_num" => trim($_POST['property_inv_num']),
	 	"mat_inv_num" => trim($_POST['inv_num']),
	 	"mat_lastinv_year" => trim($_POST['last_year_inventoried'])
	];
	$errors = validateMaterial($conn, $info, $initialInfo);		//validate the input of user
	if(!empty($errors)){	//some user input are invalid
		$data['success'] = false;
		$data['errors'] = $errors;	
	}
	else{	//all the inputs of user are valid
		edit($conn, "MATERIAL", $id, $info); //edit info in Materials table
		$change_info = [
			"staff_id" => $_SESSION["staff_id"],
			"mat_id" => $id,
			"change_type" => "edit",
			"change_date" => date("Y-m-d H:i:s"),
			"change_prev_info" => json_encode($row)
		];
		add($conn, "CHANGES", $change_info); //record changes to Changes table
		$data["success"] = true;
	}
	echo json_encode($data);

 ?>
