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
  
  //creation of the limit part of the query
  $limit = 'LIMIT ' . $_POST["limit"];

  //creation of the sorting part of the query
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
  if($_POST["sort_direction"] > 0){
    $sort .= " ASC";
  }
  else{
    $sort .= " DESC";
  }
  $start_num = $_POST["limit"] * ($_POST["page-number"] - 1);
  $start = "WHERE row_number > $start_num";
  $subquery = "SELECT mat_id, (row_number() OVER ($sort))row_number FROM MATERIAL $condition";
  $query = "SELECT c.* FROM (SELECT a.* FROM ($subquery)a $start $limit)b INNER JOIN MATERIAL c on b.mat_id=c.mat_id";
  $result = $conn->query($query);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>