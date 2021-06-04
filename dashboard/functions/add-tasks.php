<?php 
require '../../config.php';
session_start();
$staff_id = $_SESSION["staff_id"];
$task = $_POST['task'];
$sql = "INSERT INTO todos (staff_id, title) VALUES ('$staff_id', '$task')";
$result = $conn->query($sql);
if ($result){
	echo 1;
}
else{
	echo 2;
}
    
?>

