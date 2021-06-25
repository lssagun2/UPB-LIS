<?php
	//Function that returns input errors for material forms.
	function validateMaterial($conn, $info, $initialInfo){
		$errors = [];
		//checking mat_acc_num, required field.
		if(empty($info['mat_acc_num'])){
			$errors['mat_acc_num'] = "Accession Number is required!";
		}
		//check if the user inputs the initial data info.
		else if($info['mat_acc_num'] != $initialInfo['mat_acc_num']){
			$sql = "SELECT mat_acc_num FROM MATERIAL WHERE mat_acc_num = '{$info['mat_acc_num']}'";
		 	$result = $conn->query($sql);
		 	//checks if the input already exists.
		 	if($result->num_rows != 0){
		 		$errors['mat_acc_num'] = "Accession number already exists!";
		 	}
		}
		//checks if the input barcode already exists
		if(!empty($info['mat_barcode']) && $info['mat_barcode'] != $initialInfo['mat_barcode']){
			$sql = "SELECT * FROM MATERIAL where mat_barcode = '{$info['mat_barcode']}'";
			$result = $conn->query($sql);
			if($result->num_rows != 0){
				$errors['mat_barcode'] = "Barcode already exists!";
			}
		}
		return $errors;
	}
?>