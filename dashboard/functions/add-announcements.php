<?php 
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
session_start();
$title = $conn -> real_escape_string($_POST['announcementTitle']);
$content = $conn -> real_escape_string($_POST['announcementContent']);
$info = [
	"staff_id" => $_SESSION['staff_id'],
	"title" => $title,
	"text" => $content
];
add($conn, "announcements", $info);
$data['success']  = true;
echo json_encode($data);
?>

