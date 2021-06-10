<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/validateStaff.php";
	$id = $_POST['staff_id'];
	$sql = "SELECT * FROM STAFF WHERE staff_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$data = [];
	//initialize the initial information of the staff
	$initialInfo = [ 
		"staff_username" => $row['staff_username']
	];
	//initialize the staff information into an associative array for validation and edit
	$info = [
		"staff_username" => trim($_POST['staff_username']),
		"staff_firstname" => trim($_POST['staff_firstname']),
		"staff_lastname" => trim($_POST['staff_lastname']),
		"staff_password" => trim($_POST['staff_password']),
		"confirm_password" => trim($_POST['confirm_password']),
	];
	if(isset($_POST['staff_type'])){
		$info['staff_type'] = $_POST['staff_type'];
	}
	
	$errors = validateStaff($conn, $info, $initialInfo);	//check for errors in the staff information
	if(!empty($errors)){					//there are errors in the input
		$data['success'] = false;
		$data['errors'] = $errors;
	}
	else{									//there are no errors in the input
		unset($info['confirm_password']);	//remove confirm_password from information to be updated
		$info = array_filter($info);
		edit($conn, "STAFF", $id, $info);
		$data["success"] = true;
	}
	echo json_encode($data);
 ?>
