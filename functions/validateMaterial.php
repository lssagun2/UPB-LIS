<?php
	//Function that returns input errors for material forms.
	function validateMaterial($conn, &$info, $initialInfo){
		date_default_timezone_set('Asia/Manila');
		$errors = [];
		//checking mat_acc_num, required field.
		if(empty($info['mat_acc_num'])){
			$errors['mat_acc_num'] = "Accession Number is required!";
		}
		//check if the user inputs the initial information.
		else if($info['mat_acc_num'] != $initialInfo['mat_acc_num']){
			$sql = "SELECT mat_acc_num FROM MATERIAL WHERE mat_acc_num = '{$info['mat_acc_num']}'";
		 	$result = $conn->query($sql);
		 	//checks if the input already exists.
		 	if($result->num_rows != 0){
		 		$errors['mat_acc_num'] = "Accession number already exists!";
		 	}
		}
		//check if the input barcode is different with the initial barcode
		if(!empty($info['mat_barcode']) && $info['mat_barcode'] != $initialInfo['mat_barcode']){
			$sql = "SELECT * FROM MATERIAL where mat_barcode = '{$info['mat_barcode']}'";
			$result = $conn->query($sql);
			//checks if the input barcode already exists
			if($result->num_rows != 0){
				$errors['mat_barcode'] = "Barcode already exists!";
			}
		}
		//check if the price is not empty
		if(!empty($info['mat_price_value'])){
			//check if the price is not numeric
			if(!is_numeric($info['mat_price_value'])){
				$errors['mat_price'] = "Price should be numeric!";
			}
		}
		else{
			$info['mat_price_value'] = 0;
		}
		// check if at least 1 field in acquisition date has an input from user
		if(!(empty($info['acquisition_year']) && $info['acquisition_month'] == "00" && $info['acquisition_day'] == "00")){
			$year = date("Y");
			//check if the year is invalid
			if(empty($info['acquisition_year']) || !(is_numeric($info['acquisition_year']) && $info['acquisition_year'] > 1970 && $info['acquisition_year'] <= $year)){
				$errors['mat_acquisition_date'] = true;
			}
			//check if user did not choose a month
			else if($info['acquisition_month'] == "00"){
				$errors['mat_acquisition_date'] = true;
			}
			//check if user did not choose a day
			else if($info['acquisition_day'] == "00"){
				$errors['mat_acquisition_date'] = true;
			}
			else{
				//contains the case when the year, month, and day are all valid
				$info['mat_acquisition_date'] = $info['acquisition_year'] . '-' . $info['acquisition_month'] . '-' . $info['acquisition_day'];
				unset($info['acquisition_year']);
				unset($info['acquisition_month']);
				unset($info['acquisition_day']);
			}
		}
		//format some material data if all inputs are valid
		if(empty($errors)){
			//storing accession number into multiple columns if format is correct
			if(preg_match('/[a-zA-Z]{1,8}-[0-9]{1,8}$/i', $info['mat_acc_num'])){	//checks if format of accession number is <letters>-<numbers>
		 		$accession_number = explode("-", $info['mat_acc_num']);
		 		$info['mat_acc_num1'] = $accession_number[0];
		 		$info['mat_acc_num2'] = $accession_number[1];
		 	}

			//storing inventory item number into multiple columns if format is correct
			if(preg_match('/[a-zA-Z]{1,8}-[0-9]{1,8}$/i', $info['mat_inv_num'])){	//checks if format of inventory item number is <letters>-<numbers>
		 		$inventory_item_number = explode("-", $info['mat_inv_num']);
		 		$info['mat_inv_num1'] = $inventory_item_number[0];
		 		$info['mat_inv_num2'] = $inventory_item_number[1];
		 	}

		 	//storing property inventory number into multiple columns if format is correct
			if(preg_match('/[a-zA-Z]{1,8}-[0-9]{1,8}$/i', $info['mat_property_inv_num'])){	//checks if format of property inventory number is <letters>-<numbers>
		 		$property_inventory_number = explode("-", $info['mat_property_inv_num']);
		 		$info['mat_property_inv_num1'] = $property_inventory_number[0];
		 		$info['mat_property_inv_num2'] = $property_inventory_number[1];
		 	}

		 	//storing call number into multiple columns if format is correct 
			$call_number = explode(" ", $info['mat_call_num']);
			$info['mat_call_num1'] = array_shift($call_number);
			$call_num_column2 = array_shift($call_number);
			if(is_numeric($call_num_column2)){	//checks if second column of call number is a number
				$info['mat_call_num2'] = $call_num_column2;
				$info['mat_call_num3'] = implode(" ", $call_number);
			}
		}
		return $errors;
	}
?>