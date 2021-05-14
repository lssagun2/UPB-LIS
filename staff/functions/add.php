<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	date_default_timezone_set('Asia/Manila');
	$data = [];
	$info = [
	 	"staff_username" => trim($_POST['staff_username']),
	 	"staff_firstname" => trim($_POST['staff_firstname']),
	 	"staff_lastname" => trim($_POST['staff_lastname']),
	 	"staff_password" => trim($_POST['staff_password']),
	 	"confirm_password" => trim($_POST['confirm_password'])
	 ];
	$errors = validateInput($conn, $info, 'STAFF');
	if(!empty($errors)){
		$data['errors'] = $errors;
		$data['success'] = false;
	}
	else{
		unset($info['confirm_password']); //Changes, invalid sql string pag meron confirm_password
		add($conn, "STAFF", $info);
		$data["success"] = true;
	}
	echo json_encode($data);
?>

