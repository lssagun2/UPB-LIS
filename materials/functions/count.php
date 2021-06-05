<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  //creation of the condition part of the query given by the filters
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);
  if(!empty($filter)){
    $condition = "WHERE ";
    foreach($filter as $column => $value){
      $condition .= "$column='$value' AND ";
    }
    $condition = substr($condition, 0, -4);
  }
  else{
    $condition = "";
  }
  if($_POST["search-value"] != ""){
    if(!empty($filter)){
      $condition .= "AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
    else{
      $condition = "WHERE " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
  }
  $sql = "SELECT COUNT(*) as material_count FROM MATERIAL $condition";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $data = $row["material_count"];
  echo json_encode($data);
?>