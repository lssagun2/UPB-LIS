<?php 
require '../../../config.php';

function edit($conn, $table, $id, $inputs){
		$edit = "";
		switch ($table) {
			case "STAFF":
				$sql = "UPDATE STAFF SET ";
				$change = ["staff_username" => $inputs[0], "staff_firstname" => $inputs[1],  "staff_lastname" => $inputs[2],"staff_password" => $inputs[3] ];
				foreach($change as $column => $input){
					$edit = $edit. "$column = '$input',";
				}
				$sql = $sql. $edit;
				$sql = substr($sql, 0, -1);
				$sql = $sql. " WHERE staff_id = '$id'";
				$result = $conn->query($sql);

				if($result = $conn->query($sql)){
					echo '<script> alert("Data Saved"); </script>';
					header('Location: ../../index.php');
				}
				else{
					echo '<script> alert("Data not Saved"); </script>';
				}
				break;
				//add for all the tables
			case "MATERIAL":
				$sql = "UPDATE MATERIAL SET ";
				$change = ["mat_acc_num" => $inputs[0], "mat_barcode" => $inputs[1],  "mat_call_num" => $inputs[2],"mat_title" => $inputs[3], "mat_author" => $inputs[4], "mat_volume" => $inputs[5], "mat_year" => $inputs[6], "mat_edition" => $inputs[7], "mat_publisher" => $inputs[8], "mat_pub_year" => $inputs[9], "mat_circ_type" => $inputs[10], "mat_type" => $inputs[11], "mat_status" => $inputs[12], "mat_source" => $inputs[13], "mat_lastinv_year" => $inputs[14]];
				foreach($change as $column => $input){
					$edit = $edit. "$column = '$input',";
				}
				$sql = $sql. $edit;	
				$sql = substr($sql, 0, -1);
				$sql = $sql. " WHERE mat_id = '$id'";
				echo $sql;
				$result = $conn->query($sql);

				if($result = $conn->query($sql)){
					echo '<script> alert("Data Saved"); </script>';
					header('Location: ../../index.php');
				}
				else{
					echo '<script> alert("Data not Saved"); </script>';
				}
				break;
			default:
				break;
		}					
}
if(isset($_POST['editdata'])){
	$primarykey = $_POST['primarykey'];
	$table = $_POST['table'];


	switch ($table) {
		case "STAFF":
			$inputs=[$_POST['staffusername'], $_POST['stafffirstname'], $_POST['stafflastname'], $_POST['staffpassword']];
			break;
		
		case "MATERIAL":
			$inputs=[$_POST['mataccnum'], $_POST['matbarcode'], $_POST['matcallnum'], $_POST['mattitle'], $_POST['matauthor'], $_POST['matvolume'], $_POST['matyear'], $_POST['matedition'], $_POST['matpublisher'], $_POST['matpubyear'], $_POST['matcirctype'], $_POST['mattype'], $_POST['matstatus'], $_POST['matsource'], $_POST['matlastyearinv']];
			break;
	}
	
	edit($conn, $table, $primarykey, $inputs);

	
	
}

// 		$sql = $sql.$edit;
// 		$sql = substr($sql, 0, -1);
// 		$sql = $sql. " WHERE staff_id = '$id'";
// 		echo $sql;
// 		if($result = $conn->query($sql)){
// 			echo '<script> alert("Data Saved"); </script>';
// 			header('Location: staff.php');
// 		}
// 		else{
// 			echo '<script> alert("Data not Saved"); </script>';
// 		}
// }
	// example use of edit function


	// for staff:
		// $sql = "SELECT staff_id FROM STAFF WHERE staff_id = '13'";
		// $result = $conn->query($sql);
		// $row = $result->fetch_assoc();
		// $staff_id = $row["staff_id"];
		// $change = [
		// 	"staff_username" => "a",
		// 	"staff_firstname" => "b",
		// 	"staff_lastname" => "c",
		// 	"staff_password" => "69"
		// ];
		// edit($conn ,"STAFF", $staff_id, $change);


	// for materials: (assume lssagun2 is logged in)
	// 	$sql = "SELECT mat_id FROM MATERIAL WHERE mat_acc_num = 'BC-42525'";
	// 	$result = $conn->query($sql);
	// 	$row = $result->fetch_assoc();
	// 	$mat_id = $row["mat_id"];
	// 	$info = [
	// 		"mat_acc_num" => "BC-42526",
	// 		"mat_barcode" => "UBULB0018123",
	// 		"mat_call_num" => "B 2598 R8 1992",
	// 		"mat_last_inv" => 2021
	// 	];
	// 	edit("MATERIAL", $mat_id, $info);
	// 	$change_info = [
	// 		"staff_username" = "lssagun2",
	// 		"mat_id" = "$mat_id",
	// 		"change_type" = "Edit",
	// 		"change_date" = date('Y-m-d'),
	// 		"change_prev_info" = serialize($info)
	// 	];
	// 	add("CHANGE", $info);
	
 ?>