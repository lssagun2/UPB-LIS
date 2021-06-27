<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UPB_LIS";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$year = date("Y");
$sql = "SHOW COLUMNS FROM INVENTORY LIKE '%_year'";
$result = $conn->query($sql);
if($result->num_rows == 0){
  $sql = "ALTER TABLE INVENTORY ADD staff_id_$year INT AFTER mat_id";
  $conn->query($sql);
  $sql = "ALTER TABLE INVENTORY ADD date_$year DATETIME AFTER mat_id";
  $conn->query($sql);
  $sql = "ALTER TABLE INVENTORY ADD inv_$year INT AFTER mat_id";
  $conn->query($sql);
}
?>