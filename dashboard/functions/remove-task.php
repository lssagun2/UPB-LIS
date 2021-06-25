<?php 
//Function for deleting a specific announcement.
require '../../config.php';
session_start();
$staff_id = $_SESSION["staff_id"];
$id = $_POST['id'];
//SQL Query for deleting task.
$sql = "DELETE FROM todos WHERE todo_id = $id";
$result = $conn->query($sql);
if ($result){
	echo 1;
}
else{
	echo 0;
}

    
?>

