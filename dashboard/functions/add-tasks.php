<?php 
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
session_start();
$title = $conn -> real_escape_string($_POST['task']);
$info = [
	"staff_id" => $_SESSION['staff_id'],
	"title" => $title
];
add($conn, "todos", $info);
echo 1;
    
?>

