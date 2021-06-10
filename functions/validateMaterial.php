<?php
	function validateMaterial($conn, $info, $initialInfo){
		$errors = [];
		if(empty($info['mat_acc_num'])){
			$errors['mat_acc_num'] = "Accession Number is required!";
		}
		else if($info['mat_acc_num'] != $initialInfo['mat_acc_num']){
			$sql = "SELECT mat_acc_num FROM MATERIAL WHERE mat_acc_num = '{$info['mat_acc_num']}'";
		 	$result = $conn->query($sql);
		 	if($result->num_rows != 0){
		 		$errors['mat_acc_num'] = "Accession number already exists!";
		 	}
		}
		if(!empty($info['mat_barcode']) && $info['mat_barcode'] != $initialInfo['mat_barcode']){
			$sql = "SELECT * FROM MATERIAL where mat_barcode = '{$info['mat_barcode']}'";
			$result = $conn->query($sql);
			if($result->num_rows != 0){
				$errors['mat_barcode'] = "Barcode already exists!";
			}
		}
		// if(empty($info['mat_call_num'])){
		//  	$errors['mat_call_num'] = "Call Number is required!";
		// }
		// else{
		// 	$sql = "SELECT * FROM MATERIAL WHERE mat_call_num = '{$info['mat_call_num']}'";
		//   	$result = $conn->query($sql);
		//   	if($result->num_rows != 0){
		//   		$errors['mat_call_num'] = "Call Number already exists!";
		//   	}
		// }
		// if(!preg_match("/^[a-zA-Z-' ],[a-zA-Z-' ]*$/", $info['mat_author'])){
		//   	$errors['mat_author'] = "Only Letters are allowed!";
		// }
		// if(!preg_match('/^[0-9]{0,4}$/i', $info['mat_year'])){
		// 	$errors['mat_year'] = "Enter valid year, format: xxxx (x is any number).";
		// }
		// if(!preg_match('/^[0-9]{0,4}$/i', $info['mat_pub_year'])){
		// 	$errors['mat_pub_year'] = "Enter valid year, format: xxxx (x is any number).";
		// }
		return $errors;
	}
?>