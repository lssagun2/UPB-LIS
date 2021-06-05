<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $year1 = intval($_POST["year1"]);
	$year2 = intval($_POST["year2"]);
	$inv_query = "(SELECT mat_id FROM INVENTORY WHERE ";
	$comparison = filter_var($_POST["comparison"], FILTER_VALIDATE_BOOLEAN);
	if(!$comparison){
		$inv_query .= "inv_$year1 = {$_POST['category']})";
	}
	else{
		switch(intval($_POST["category"])){
			case 0:
				$inv_query .= "inv_$year1 = 0 AND inv_$year2 = 0)";
				break;
			case 1:
				$inv_query .= "inv_$year1 = 0 AND inv_$year2 = 1)";
				break;
			case 2:
				$inv_query .= "inv_$year1 = 1 AND inv_$year2 = 0)";
				break;
			case 3:
				$inv_query .= "inv_$year1 = 1 AND inv_$year2 = 1)";
				break;
			default: break;
		}
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
    $mat_query = substr($mat_query, 0, -4);
    if($_POST["search-value"] != ""){
      $mat_query .= " AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
		$mat_query .= ")";
  }
	else{
    if($_POST["search-value"] != ""){
      $mat_query .= " " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%')";
    }
    else{
      $mat_query = "";
    }
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
