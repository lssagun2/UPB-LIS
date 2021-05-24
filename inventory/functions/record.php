<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	date_default_timezone_set('Asia/Manila');
	$year = date("Y");
	if($_POST["inventory-input"] != ""){
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
				$inv_info = [
					'mat_id' => $mat_id,
					"inv_$year" => 1,
					"date_$year" => date("Y-m-d H:i:s"),
					"staff_id_$year" => $_SESSION["staff_id"]
				];
				edit($conn, "INVENTORY", $mat_id, $inv_info);
				$data['message'] = "The material was successfully inventoried.";
			}
			else{
				$data['inventoried'] = false;
				$data['message'] = "The material was already inventoried!";
			}
		}
		else{
			$data['success'] = false;
			$data['message'] = "The material is not found!";
		}
	}
	else{
		$data['success'] = false;
		$data['message'] = "The input is empty!";
	}
	
	echo json_encode($data);
?>