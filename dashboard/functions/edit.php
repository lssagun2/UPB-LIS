<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/edit.php";
	date_default_timezone_set('Asia/Manila');
	$table = $_POST['table'];


	switch ($table) {
		case 'MATERIAL':
			$id = $_POST['id'];
			$sql = "SELECT * FROM MATERIAL WHERE mat_id = $id";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
	
			$info=[
				"mat_acc_num" => $_POST['acc_num'],
			 	"mat_barcode" => $_POST['barcode'],
			 	"mat_call_num" => $_POST['call_number'],
			 	"mat_title" => $_POST['title'],
			 	"mat_author" => $_POST['author'],
			 	"mat_volume" => $_POST['volume'],  
			 	"mat_year" => $_POST['year'], 
			 	"mat_edition" => $_POST['edition'], 
			 	"mat_publisher" => $_POST['publisher'],
			 	"mat_pub_year" => $_POST['pub_year'],
			 	"mat_circ_type" => $_POST['circ_type'],
			 	"mat_type" => $_POST['type'],
			 	"mat_status" => $_POST['status'],
			 	"mat_source" => $_POST['source'], 
			 	"mat_lastinv_year" => $_POST['last_year_inventoried']
			 ];
			$info = array_filter($info);
			edit($conn, "MATERIAL", $id, $info);
			$change_info = [
				"staff_id" => $_SESSION["staff_id"],
				"mat_id" => $id,
				"change_type" => "edit",
				"change_date" => date("Y-m-d H:i:s"),
				"change_prev_info" => serialize($row)
			];
			add($conn, "CHANGES", $change_info);
			$data["success"] = true;
			echo json_encode($data);
			break;

		case 'STAFF':
			$id = $_SESSION['staff_id'];
			$sql = "SELECT * FROM STAFF WHERE staff_id = $id";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
	
			$info=[
				"staff_username" => $_POST['username'],
				"staff_firstname" => $_POST['firstname'],
				"staff_lastname" => $_POST['lastname'],
				"staff_password" => $_POST['password'],
			 ];
			$info = array_filter($info);
			edit($conn, "STAFF", $id, $info);
			$data["success"] = true;
			echo json_encode($data);
			break;
		
		default:
			# code...
			break;
	}
	

	
	
 ?>
