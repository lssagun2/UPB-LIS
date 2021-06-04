<?php 
require '../../config.php';
session_start();
$staff_id = $_SESSION["staff_id"];
$announcement = $_POST['announcement'];
$sql = "INSERT INTO announcements (staff_id, text) VALUES ('$staff_id', '$announcement')";
$result = $conn->query($sql);
if ($result){
	echo 1;
}
else{
	echo 2;
}
    
?>

