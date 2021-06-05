<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	$id = $_POST['staff_id'];
	$sql = "SELECT * FROM STAFF WHERE staff_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$data = []; //Changes
	//Changes.array
	$initialInfo = [ 
		"staff_username" => $row['staff_username']
	];
	//Changes trim POST values
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
	

	$errors = validateInputforEdit($conn, $info, $initialInfo, "STAFF"); //Changes
	if(!empty($errors)){ //Changes
		$data['success'] = false;
		$data['errors'] = $errors;
	}
	else{
		unset($info['confirm_password']); //Changes, invalid sql string pag meron confirm_password
		$info = array_filter($info);
		edit($conn, "STAFF", $id, $info);
		$data["success"] = true;
	}
	echo json_encode($data);
 ?>
