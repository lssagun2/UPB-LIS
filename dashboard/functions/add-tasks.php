<?php 
//Function for adding task.
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
session_start();
//Prepares input string by escaping certain characters so that they can’t be misinterpreted as a string delimiter or an escape sequence delimiter.
$title = $conn -> real_escape_string($_POST['task']);
//Store all input data inside $info variable
$info = [
	"staff_id" => $_SESSION['staff_id'],
	"title" => $title
];
//Call function that performs SQL query for adding announcement inside database.
add($conn, "todos", $info);
echo 1;
    
?>

