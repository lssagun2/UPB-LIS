<?php
  /*
    This PHP file is called by update() function via AJAX of jQuery. It outputs all the corresponding materials given the filter, sort, and search restrictions, along with the number of entries per page and the current page number. 
  */


	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $year = $_POST['year'];
  $prev_year = $year - 1;
  //create subquery for the Inventory table
  switch($_POST['category']){
    //create Inventory table subquery depending on the category of the requested table
    case "inventoried":
      $inv_query = "(SELECT mat_id, date_$year, staff_id_$year FROM INVENTORY WHERE inv_$year = 1)";  //subquery when user chooses inventoried materials
      break;
    case "not_inventoried":
      $inv_query = "(SELECT mat_id, date_$year FROM INVENTORY WHERE inv_$year = 0)";  //subquery when user chooses not inventoried materials
      break;
    case "not_acquired":
      $inv_query = "(SELECT mat_id, date_$year FROM INVENTORY WHERE inv_$year = -1)"; //subquery when user chooses not acquired materials
      break;
    case "new_acquired":
      $inv_query = "(SELECT mat_id, date_$year FROM INVENTORY WHERE inv_$prev_year = -1 AND inv_$year != -1)";  //subquery when user chooses new acquisitions
      break;
    default: break;
  }
  //creation of the where clause of the Material table query using the filters
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);  //remove empty elements of the array
	$mat_query = "(SELECT * FROM MATERIAL WHERE ";
	if(!empty($filter)){
    //create where clause if user applied filter/s
    foreach($filter as $column => $value){
      $mat_query .= "$column='$value' AND ";
    }
    $mat_query = substr($mat_query, 0, -4);
  }
  else{
    $mat_query = "";
  }

  //checking if the material input any search substring
  if($_POST["search-value"] != ""){
    if(!empty($filter)){
      $mat_query .= "AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";  //append to where clause when there are applied filters
    }
    else{
      $mat_query = "WHERE " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'"; //create where clause when there are no applied filters
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
    case "Property Inventory Number": //sorting by property inventory number
      $sort .= "mat_property_inv_num = '' ASC, mat_property_inv_num $sort_direction";
      break;
    case "Last Year Inventoried": //sorting by last year inventoried
      $sort .= "mat_lastinv_year = 0 ASC, mat_lastinv_year $sort_direction";
      break;
    case "Staff Name":  //sorting by name of staff who inventoried material
      $sort .= "staff_id_$year $sort_direction";
      break;
    case "Inventory Date":  //sorting by date of inventory
      $sort .= "DATE(date_$year) $sort_direction";
      break;
    default:
      $sort .= "mat_id DESC";  // default sorting is by mat_id in descending order
      break;
  }
  $start_num = $_POST["limit"] * ($_POST["page-number"] - 1);
  $start = "WHERE row_number > $start_num";
  //subquery for inventoried materials
  if($_POST["category"] == "inventoried"){
    $subquery = "
      SELECT (row_number() OVER ($sort)) row_number, MATERIAL.*, DATE_FORMAT(INVENTORY.date_$year, '%b %e, %h:%i %p') AS year, STAFF.staff_firstname, STAFF.staff_lastname
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
        INNER JOIN STAFF ON INVENTORY.staff_id_$year = STAFF.staff_id";
  }
  //subquery for materials not inventoried
  else{
    $subquery = "
      SELECT (row_number() OVER ($sort)) row_number, MATERIAL.*
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id";
  }
  $query = "SELECT * FROM ($subquery)a $start $limit"; //main query retrieving information from table created by subquery
  $result = $conn->query($query);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>
