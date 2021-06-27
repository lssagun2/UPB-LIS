<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	date_default_timezone_set('Asia/Manila');
	$year = date("Y");
	if($_POST["inventory-input"] != ""){ //Fetch information via inventory-input id
		$column = $_POST["material_column"];
		$value = $_POST["inventory-input"];
		$sql = "SELECT * FROM MATERIAL WHERE $column = '$value'";
		$result = $conn->query($sql);
		$data = [];

		if($result->num_rows != 0){
			$row = $result->fetch_assoc();
			$mat_id = $row['mat_id'];
			$data["material"] = $row;
			$data["success"] = true;
			$sql = "SELECT 1 FROM INVENTORY WHERE mat_id = $mat_id AND inv_$year = 1";
			$result = $conn->query($sql);
			if($result->num_rows == 0){
				$data['inventoried'] = true;
				$inv_info = [ //Inventory information array
					"inv_$year" => 1,
					"date_$year" => date("Y-m-d H:i:s"),
					"staff_id_$year" => $_SESSION["staff_id"]
				];
				edit($conn, "INVENTORY", $mat_id, $inv_info); //Edit info in Inventory table
				$mat_info = [
					"mat_lastinv_year" => $year 	//Set last inventoried year to current year
				];
				edit($conn, "MATERIAL", $mat_id, $mat_info); //Update last year inventoried column in Material table
				$data['message'] = "The material was successfully inventoried."; // Inventory successful
			}
			else{
				$data['inventoried'] = false;
				$data['message'] = "The material was already inventoried!"; //If material exists in inventory table but was already inventoried
			}
		}
		else{
			$data['success'] = false;
			$data['message'] = "The material is not found!"; //If material cannot be found in materials table
		}
	}
	else{
		$data['success'] = false;
		$data['message'] = "The input is empty!";
	}
	
	echo json_encode($data);
?>