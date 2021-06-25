<?php 
//Importing other functions from necessary php files and connecting to the DB.
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
session_start();
//Prepares input string by escaping certain characters so that they can’t be misinterpreted as a string delimiter or an escape sequence delimiter.
$title = $conn -> real_escape_string($_POST['announcementTitle']);
$content = $conn -> real_escape_string($_POST['announcementContent']);
$announce_id = $_POST['announcement_id'];
//SQL query for editing announcement in the DB.
$sql = "UPDATE announcements SET title = '$title', text = '$content' WHERE announce_id = '$announce_id'";
$result = $conn -> query($sql);
$data['success'] = true;
echo json_encode($data);
?>

