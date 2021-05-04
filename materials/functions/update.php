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
  
  $limit = 'LIMIT ' . $_POST["limit"];
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
  $offset = "";
  if(isset($_POST["previous_value"])){
    $prev_value = $_POST["previous_value"];
    if($prev_value === ""){
      $offset = 'OFFSET ' . $_POST["limit"] * ($_POST["page-number"] - 1) - 1;
    }
    else{
      if($condition === ""){
        $condition = "WHERE ";
      }
      else{
        $condition .= "AND ";
      }
      switch ($column) {
        case "Accession Number":
          $condition .= "mat_acc_num > '"  . addslashes($prev_value) . "'";
          break;
        case "Barcode":
          $condition .= "mat_barcode > '"  . addslashes($prev_value) . "'";
          break;
        case "Call Number":
          $condition .= "mat_call_num > '"  . addslashes($prev_value) . "'" ;
          break;
        case "Title":
          $condition .= "mat_title > '"  . addslashes($prev_value) . "'";
          break;
        default:
          $condition .= "mat_id > '"  . addslashes($prev_value) . "'";
          break;
      }
    }
  }
  $sql = "SELECT * FROM MATERIAL $condition $sort $limit $offset";
  $result = $conn->query($sql);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>