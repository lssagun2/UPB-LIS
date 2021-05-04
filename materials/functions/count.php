<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $filter = [];
  if($_POST["circtype-filter"] != ""){
    $filter["mat_circ_type"] = $_POST["circtype-filter"];
  }
  if($_POST["type-filter"] != ""){
    $filter["mat_type"] = $_POST["type-filter"];
  }
  if($_POST["status-filter"] != ""){
    $filter["mat_status"] = $_POST["status-filter"];
  }
  if($_POST["location-filter"] != ""){
    $filter["mat_location"] = $_POST["location-filter"];
  }
  $condition = "WHERE ";
  foreach($filter as $column => $value){
    $condition .= "$column='$value' AND ";
  }
  $condition = substr($condition, 0, -4);
  $sql = "SELECT COUNT(*) as material_count FROM MATERIAL $condition";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $data = $row["material_count"];
  echo json_encode($data);
?>