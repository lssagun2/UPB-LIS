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
  
  $limit = 'LIMIT 1';
  $offset = 'OFFSET ' . $_POST["limit"] * ($_POST["page-number"] - 1) - 1;
  $sort = "ORDER BY ";
  $column = $_POST["sort"];
  switch ($column) {
    case "Accession Number":
      $sort .= "mat_acc_num";
      break;
    case "Barcode":
      $sort .= "mat_barcode";
      break;
    case "Call Number":
      $sort .= "mat_call_num";
      break;
    case "Title":
      $sort .= "mat_title";
      break;
    default:
      $sort .= "mat_id";
      break;
  }
  $sql = "SELECT * FROM MATERIAL $condition $sort $limit $offset";
  $result = $conn->query($sql);
  $data = $result->fetch_assoc();
  echo json_encode($data);
?>