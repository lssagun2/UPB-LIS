<?php 
//Function for fetching contents of a particular announcement.
require '../../config.php';
session_start();

if(isset($_POST['id'])){
	$id = $_POST['id'];
	//SQL Query fetching specific(clicked) announcement.
	$sql = "SELECT * FROM announcements where announce_id = '$id'";
	$result = $conn->query($sql);
	//Storing the fetched data inside $row variable.
	$row = $result->fetch_assoc();

	//Fetching author details by using data from preceding SQL query.
	$sql2 = "SELECT * FROM staff where staff_id = '{$row['staff_id']}'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	//Adding firstname and lastname of the author inside $row array.
	$row['staff_firstname'] = $row2['staff_firstname'];
	$row['staff_lastname'] = $row2['staff_lastname'];
	echo json_encode($row);
}
?>

