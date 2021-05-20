<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $year = date('Y');

  $inv_query = "(SELECT mat_id FROM INVENTORY WHERE ";
  if($_POST["category"] == "inventoried"){
    $inv_query .= "inv_$year = 1)";
  }
  else{
    $inv_query .= "inv_$year = 0)";
  }
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);
	$mat_query = "(SELECT mat_id FROM MATERIAL WHERE";
	if(!empty($filter)){
    foreach($filter as $column => $value){
      $mat_query .= " $column='$value' AND";
    }
    $mat_query = substr($condition, 0, -4);
		$mat_query .= ")";
  }
	else{
		$mat_query = "";
	}

  $query = "
    SELECT COUNT(1) as material_count
    FROM {$inv_query}INVENTORY
      INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  $data = $row["material_count"];
  echo json_encode($data);
?>
