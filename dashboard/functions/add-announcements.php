<?php 
//Function for adding announcement.
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
session_start();
//Prepares input string by escaping certain characters so that they can’t be misinterpreted as a string delimiter or an escape sequence delimiter.
$title = $conn -> real_escape_string($_POST['announcementTitle']);
$content = $conn -> real_escape_string($_POST['announcementContent']);
//Store all input data inside $info variable
$info = [
	"staff_id" => $_SESSION['staff_id'],
	"title" => $title,
	"text" => $content
];
//Call function that performs SQL query for adding announcement inside database.
add($conn, "announcements", $info);
$data['success']  = true;
echo json_encode($data);
?>

