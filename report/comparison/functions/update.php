<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	$year1 = intval($_POST["year1"]);
  $prev_year = $year1 - 1;
	$year2 = intval($_POST["year2"]);
	$comparison = filter_var($_POST["comparison"], FILTER_VALIDATE_BOOLEAN);
	if(!$comparison){
    switch($_POST['category']){
      case "inventoried":
        $inv_query = "(SELECT mat_id, date_$year1, staff_id_$year1 FROM INVENTORY WHERE inv_$year1 = 1)";
        break;
      case "not_inventoried":
        $inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE inv_$year1 = 0)";
        break;
      case "not_acquired":
        $inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE inv_$year1 = -1)";
        break;
      case "new_acquired":
        $inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE inv_$prev_year = -1 AND inv_$year1 != -1)";
        break;
      default: break;
    }
	}
	else{
		$inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE ";
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
	$mat_query = "(SELECT * FROM MATERIAL WHERE";
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);
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

  //creation of the limit part of the query
  $limit = 'LIMIT ' . $_POST["limit"];

  //creation of the sorting part of the query
  if($_POST["sort_direction"] > 0){
    $sort_direction = "ASC";
  }
  else{
    $sort_direction = "DESC";
  }
  $sort = "ORDER BY ";
  $column = $_POST["sort"];
  switch ($column) {
    case "Accession Number":
      $sort .= "mat_acc_num1 $sort_direction, mat_acc_num2 $sort_direction, mat_acc_num $sort_direction";
      break;
    case "Barcode":
      $sort .= "mat_barcode $sort_direction";
      break;
    case "Call Number":
      $sort .= "mat_call_num1 $sort_direction, mat_call_num2 $sort_direction, mat_call_num3 $sort_direction, mat_call_num $sort_direction";
      break;
    case "Title":
      $sort .= "mat_title $sort_direction";
      break;
    case "Inventoried By":
      $sort .= "staff_id_$year1 $sort_direction";
    default:
      $sort .= "date_$year1 $sort_direction";
      break;
  }
  $start_num = $_POST["limit"] * ($_POST["page-number"] - 1);
  $start = "WHERE row_number > $start_num";
  //subquery for inventoried materials
  if(!$comparison && $_POST["category"] === "inventoried"){
    $subquery = "
      SELECT (row_number() OVER ($sort)) row_number, MATERIAL.*, INVENTORY.date_$year1 AS year, STAFF.staff_firstname, STAFF.staff_lastname
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
        INNER JOIN STAFF ON INVENTORY.staff_id_$year1 = STAFF.staff_id
    ";
  }
  //subquery for materials not inventoried
  else{
    $subquery = "
      SELECT (row_number() OVER ($sort)) row_number, MATERIAL.*
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
    ";
  }
  $query = "SELECT * FROM ($subquery)a $start $limit";
  $result = $conn->query($query);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>
