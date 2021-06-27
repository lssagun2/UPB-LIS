<?php
  /*
    This PHP file is called by update() function via AJAX of jQuery. It outputs all the corresponding materials given the filter, sort, and search restrictions, along with the number of entries per page and the current page number. 
  */

	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  //initiailization of the 1 or 2 years involved in the report table
	$year1 = intval($_POST["year1"]);
  $prev_year = $year1 - 1;
	$year2 = intval($_POST["year2"]);
	$comparison = filter_var($_POST["comparison"], FILTER_VALIDATE_BOOLEAN);
	if(!$comparison){  //the user chose information for a certain year only
    switch($_POST['category']){
      //create Inventory table query according to category
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
	else{  //the user chose information involving a comparison
		$inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE ";
    //specify inventory table query according to category
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
  //creation of the Material table subquery
	$mat_query = "(SELECT * FROM MATERIAL WHERE";
  //creation of the where clause using the active filters
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);  //remove empty elements of the array
	if(!empty($filter)){ //there are active filters
    foreach($filter as $column => $value){
      $mat_query .= " $column='$value' AND";
    }
    $mat_query = substr($mat_query, 0, -4);
    //creation of search part of the query if there are filters
    if($_POST["search-value"] != ""){
      $mat_query .= " AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
    $mat_query .= ")";
  }
  else{   //there are no active filters
    //creation of search part of the query if there are no filters
    if($_POST["search-value"] != ""){
      $mat_query .= " " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%')";
    }
    else{
      $mat_query = "";
    }
  }

  //creation of the limit part of the query
  $limit = 'LIMIT ' . $_POST["limit"];

  
  //choosing the direction of the sorting
  if($_POST["sort_direction"] > 0){
    $sort_direction = "ASC";
  }
  else{
    $sort_direction = "DESC";
  }
  //creation of the sorting part of the query
  $sort = "ORDER BY ";
  switch ($_POST["sort"]) {
    case "Accession Number":  //sorting by accession number
      $sort .= "mat_acc_num = '' ASC, mat_acc_num1 $sort_direction, mat_acc_num2 $sort_direction, mat_acc_num $sort_direction";
      break;
    case "Barcode":           //sorting by barcode
      $sort .= "mat_barcode = '' ASC, mat_barcode $sort_direction";
      break;
    case "Call Number":       //sorting by call number
      $sort .= "mat_call_num = '' ASC, mat_call_num1 $sort_direction, mat_call_num2 $sort_direction, mat_call_num3 $sort_direction, mat_call_num $sort_direction";
      break;
    case "Title":             //sorting by title
      $sort .= "mat_title = '' ASC, mat_title $sort_direction";
      break;
    case "Source":            //sorting by source
      $sort .= "mat_source = '' ASC, mat_source $sort_direction";
      break;
    case "Price":             //sorting by price
      $sort .= "mat_price_value = 0 ASC, mat_price_currency $sort_direction, mat_price_value $sort_direction";
      break;
    case "Acquisition Date":  //sorting by acquisition date
      $sort .= "mat_acquisition_date = '0000-00-00' ASC, DATE(mat_acquisition_date) $sort_direction";
      break;
    case "Inventory Item Number": //sorting by inventory item number
      $sort .= "mat_inv_num = '' ASC, mat_inv_num $sort_direction";
      break;
    case "Property Inventory Number":   //sorting by property inventory number
      $sort .= "mat_property_inv_num = '' ASC, mat_property_inv_num $sort_direction";
      break;
    case "Last Year Inventoried":   //sorting by last year inventoried
      $sort .= "mat_lastinv_year = 0 ASC, mat_lastinv_year $sort_direction";
      break;
    case "Staff Name":  //sorting by name of staff who inventoried material
      $sort .= "staff_id_$year $sort_direction";
      break;
    case "Inventory Date":  //sorting by the inventory date
      $sort .= "DATE(date_$year) $sort_direction";
      break;
    default:
      $sort .= "mat_id DESC";
      break;
  }
  $start_num = $_POST["limit"] * ($_POST["page-number"] - 1); //compute for the row number of the current page given limit and page number
  $start = "WHERE row_number > $start_num";   //choose only materials after the starting row number
  //subquery for inventoried materials
  if(!$comparison && $_POST["category"] === "inventoried"){
    //creation of subquery if material chose inventoried materials not involving a comparison
    $subquery = "
      SELECT (row_number() OVER ($sort)) row_number, MATERIAL.*, DATE_FORMAT(INVENTORY.date_$year1, '%b %e, %h:%i %p') AS year, STAFF.staff_firstname, STAFF.staff_lastname
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
        INNER JOIN STAFF ON INVENTORY.staff_id_$year1 = STAFF.staff_id
    ";
  }
  //subquery for not inventoried materials 
  else{
    //subquery for some other cases
    $subquery = "
      SELECT (row_number() OVER ($sort)) row_number, MATERIAL.*
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
    ";
  }
  $query = "SELECT * FROM ($subquery)a $start $limit";  //main query to retrieve information from the table created by the subquery
  $result = $conn->query($query);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>
