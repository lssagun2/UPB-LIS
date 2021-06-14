<?php
	function validateStaff($conn, $info, $initialInfo){
		if(empty($info['staff_username'])){
			$errors['staff_username'] = "Username is Required!";
		}
		else if($info['staff_username'] != $initialInfo['staff_username']){
			$sql = "SELECT * FROM STAFF WHERE staff_username = '{$info['staff_username']}'";
			$result = $conn->query($sql);
			if($result->num_rows != 0){
				 $errors['staff_username'] = "Username already exists!";
			}
		}
		if(empty($info['staff_firstname'])){
			$errors['staff_firstname'] = "First naame is required!";
		}
		
		if(empty($info['staff_lastname'])){
			$errors['staff_lastname'] = "Last naame is required!";
		}		

		if(empty($info['staff_password'])){
			$errors['staff_password'] = "Password is required!";
		}

		if($info['confirm_password'] != $info['staff_password']){
			$errors['confirm_password'] = "Password doesn't match!";
		}
		if(!empty($errors)){
			return $errors;
		}
	}
?>
