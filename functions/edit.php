<?php
	function edit($conn, $table, $id, $change){
		$edit = "";
		if($table === "MATERIAL" || $table === "INVENTORY"){
			$primary_key = "mat_id";
		}
		else if($table === "STAFF"){
			$primary_key = "staff_id";
		}
		foreach($change as $column => $value){
			$edit .= "$column = '$value',";
		}
		$edit = substr($edit, 0, -1);
		$sql = "UPDATE $table SET $edit WHERE $primary_key = $id";
		$conn->query($sql);
	}
	
	// function validateInputforEdit($conn, &$info, &$initialInfo, $table){
	// 	$errors = [];

	// 	switch ($table) {
	// 		case 'MATERIAL':
	// 			if(!($info['mat_acc_num'] == $initialInfo['mat_acc_num'])){
	// 				if(empty($info['mat_acc_num'])){
	// 					$errors['mat_acc_num'] = "Accession Number is required!";
	// 				}
	// 				else{
	// 					$sql = "SELECT * FROM MATERIAL WHERE mat_acc_num = '{$info['mat_acc_num']}'";
	// 					$result = $conn->query($sql);
	// 					if($result->num_rows != 0){
	// 					 	$errors['mat_acc_num'] = "Accession number already exists!";
	// 					}
	// 					// if(!preg_match('/[a-zA-Z]{1,8}-[0-9]{1,8}$/i', $info['mat_acc_num'])){
	// 			 	// 		$errors['mat_acc_num'] = "Please use the format xxx-zzzz (x is any letter [max 3 letters] followed by dash and z is any number[max 8 numbers]).";
	// 			 	// 	}
	// 				}
	// 			}

	// 			if(!($info['mat_barcode'] == $initialInfo['mat_barcode'])){
	// 				$sql = "SELECT * FROM MATERIAL WHERE mat_barcode = '{$info['mat_barcode']}'";
	// 				$result = $conn->query($sql);
	// 				if($result->num_rows != 0){
	// 					 $errors['mat_barcode'] = "Barcode already exists!";
	// 				}
	// 			}
	// 			if($info['mat_barcode'] == ""){
	// 				unset($errors['mat_barcode']); 
	// 			}
	// 			// if(!($info['mat_call_num'] == $initialInfo['mat_call_num'])){
	// 			// 	if(empty($info['mat_call_num'])){
	// 			// 		$errors['mat_call_num'] = "Call number is required!";
	// 			// 	}
	// 			// 	else{
	// 			// 		$sql = "SELECT * FROM MATERIAL WHERE mat_call_num = '{$info['mat_call_num']}'";
	// 			// 		$result = $conn->query($sql);
	// 			// 		if($result->num_rows != 0){
	// 			// 			 $errors['mat_call_num'] = "Call number already exists!";
	// 			// 		}
	// 			// 	}
	// 			// }
	// 			// if(!preg_match("/^[a-zA-Z-' ],[a-zA-Z-' ]*$/", $info['mat_author'])){
	// 			//   	$errors['mat_author'] = "Only Letters are allowed!";
	// 			// }
	// 			if(!preg_match('/^[0-9]{0,4}$/i', $info['mat_year'])){
	// 				$errors['mat_year'] = "Enter valid year, format: xxxx (x is any number).";
	// 			}
	// 			if(!preg_match('/^[0-9]{0,4}$/i', $info['mat_pub_year'])){
	// 				$errors['mat_pub_year'] = "Enter valid year, format: xxxx (x is any number).";
	// 			}
	// 			break;
				
	// 		case 'STAFF':
	// 			if(!($info['staff_username'] == $initialInfo['staff_username'])){
	// 				if(empty($info['staff_username']) || $info['staff_username'] == ''){
	// 					$errors['staff_username'] = "Username is Required!";
	// 				}
	// 				else{
	// 					$sql = "SELECT * FROM STAFF WHERE staff_username = '{$info['staff_username']}'";
	// 					$result = $conn->query($sql);
	// 					if($result->num_rows != 0){
	// 					 	$errors['staff_username'] = "Username already exists!";
	// 					}
	// 				}
	// 			}
				
	// 			if(empty($info['staff_firstname'])){
	// 				$errors['staff_firstname'] = "First Name is Required!";
	// 			}
				
	// 			if(empty($info['staff_lastname'])){
	// 				$errors['staff_lastname'] = "Last Name is Required!";
	// 			}		

	// 			if(empty($info['staff_password'])){
	// 				$errors['staff_password'] = "Password is Required!";
	// 			}
	// 			if($info['confirm_password'] != $info['staff_password']){
	// 				$errors['confirm_password'] = "Password Confirmation doesn't match Password!";
	// 			}
	// 			break;



	// 		default:
	// 			break;
	// 	}

		
	// 	return $errors;
	// }
?>