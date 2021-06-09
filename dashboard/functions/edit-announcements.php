<?php 
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/functions/add.php";
session_start();
$title = $conn -> real_escape_string($_POST['announcementTitle']);
$content = $conn -> real_escape_string($_POST['announcementContent']);
// $content = $_POST['announcementContent'];
$announce_id = $_POST['announcement_id'];
$sql = "UPDATE announcements SET title = '$title', text = '$content' WHERE announce_id = '$announce_id'";
$result = $conn -> query($sql);
$data['success'] = true;
echo json_encode($data);
?>

