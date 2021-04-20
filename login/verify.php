<?php
	session_start();
	require "../config.php";
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	if(empty($username)){
		$errors["username"] = "Username cannot be empty.";
	}
	else{
		$sql = "SELECT staff_id, staff_password, staff_firstname, staff_lastname FROM STAFF WHERE staff_username = '$username'";
		$result = $conn->query($sql);
		echo $conn->error;
		if($result->num_rows == 0){
			$errors["username"] = "Username does not exist.";
		}
		else{
			$row = $result->fetch_assoc();
			if($password === $row["staff_password"]){
				$_SESSION["logged_in"] = TRUE;
				$_SESSION["staff_id"] = $row["staff_id"];
				$_SESSION["staff_firstname"] = $row["staff_firstname"];
				$_SESSION["staff_lastname"] = $row["staff_lastname"];
				$link = "../dashboard/index.php";
			}
			else{
				$errors["password"] = "Password is incorrect.";
			}
		}
	}
	if(empty($password)){
		$errors["password"] = "Password cannot be empty.";
	}
	
	
	if(!empty($errors)){
		$data["success"] = false;
		$data["errors"] = $errors;
	}
	else{
		$data["success"] = true;
		$data["link"] = $link;
	}

	echo json_encode($data);
?>