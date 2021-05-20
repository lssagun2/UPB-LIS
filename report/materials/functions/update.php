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
  if($_POST["sort_direction"] > 0){
    $sort_direction = "ASC";
  }
  else{
    $sort_direction = "DESC";
  }
  $column = $_POST["sort"];
  switch ($column) {
    case "Accession Number":
      $sort .= "mat_acc_num1 $sort_direction, mat_acc_num2 $sort_direction, mat_acc_num $sort_direction";
      break;
    case "Barcode":
      $sort .= "mat_barcode $sort_direction";
      break;
    case "Call Number":
      $sort .= "mat_call_num1 $sort_direction, mat_call_num2 $sort_direction, mat_call_num3 $sort_direction, mat_call_num4 $sort_direction, mat_call_num5 $sort_direction, mat_call_num6 $sort_direction, mat_call_num7 $sort_direction, mat_call_num8 $sort_direction, mat_call_num $sort_direction";
      break;
    case "Title":
      $sort .= "mat_title $sort_direction";
      break;
    default:
      $sort .= "mat_id $sort_direction";
      break;
  }
  $start_num = $_POST["limit"] * ($_POST["page-number"] - 1);
  $start = "WHERE row_number > $start_num";
  $subquery = "SELECT mat_id, (row_number() OVER ($sort))row_number FROM MATERIAL $condition";
  $query = "SELECT c.* FROM (SELECT a.* FROM ($subquery)a $start $limit)b INNER JOIN MATERIAL c on b.mat_id=c.mat_id";
  $result = $conn->query($query);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>