<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/validateStaff.php";
	date_default_timezone_set('Asia/Manila');
	$data = [];
	$initialInfo = [ 
		"staff_username" => ""
	];
	//initialize the staff information into an associative array for validation and insert
	$info = [
	 	"staff_username" => trim($_POST['staff_username']),
	 	"staff_firstname" => trim($_POST['staff_firstname']),
	 	"staff_lastname" => trim($_POST['staff_lastname']),
	 	"staff_password" => trim($_POST['staff_password']),
	 	"confirm_password" => trim($_POST['confirm_password']),
	 	"staff_type" => trim($_POST['staff_type'])
	 ];
	$errors = validateStaff($conn, $info, $initialInfo);	//check for errors in the staff information
	if(!empty($errors)){					//there are errors in the input
		$data['errors'] = $errors;
		$data['success'] = false;
	}
	else{									//there are no errors in the input
		unset($info['confirm_password']); 	//remove confirm_password from information to be inserted
		add($conn, "STAFF", $info);
		$data["success"] = true;
	}
	echo json_encode($data);
?>

