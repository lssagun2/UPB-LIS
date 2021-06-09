<?php 


require '../../config.php';
session_start();

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$sql = "SELECT * FROM announcements where announce_id = '$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$sql2 = "SELECT * FROM staff where staff_id = '{$row['staff_id']}'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	$row['staff_firstname'] = $row2['staff_firstname'];
	$row['staff_lastname'] = $row2['staff_lastname'];
	
	echo json_encode($row);
}


?>

