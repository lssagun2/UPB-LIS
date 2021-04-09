<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UPB_LIS";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(!(file_exists("initialize.sql"))){
	require 'config.php';
}
else{
	$sql = "DROP DATABASE $dbname;";
	$conn->query($sql);
	$sql = "CREATE DATABASE $dbname;";
	$conn->query($sql);
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$handle = fopen("initialize.sql","r+");
	$contents = fread($handle,filesize("initialize.sql"));
	$queries = explode(';',$contents);
	foreach($queries as $query){
		$conn->query($query);
	}
	// unlink("initialize.sql");
}
?>