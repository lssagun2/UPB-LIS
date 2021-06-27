<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";

  //creation of the where clause of the query using the filters
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);   //remove empty elements of the array
  //checking if the user applied one or more filter
  if(!empty($filter)){
    //create where clause if user applied filter/s
    $condition = "WHERE ";
    foreach($filter as $column => $value){
      $condition .= "$column='$value' AND ";
    }
    $condition = substr($condition, 0, -4);
  }
  else{
    $condition = "";
  }

  //checking if the material input any search substring
  if($_POST["search-value"] != ""){
    if(!empty($filter)){
      $condition .= "AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";  //append to where clause when there are applied filters
    }
    else{
      $condition = "WHERE " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'"; //create where clause when there are no applied filters
    }
  }


  //creation of the limit part of the query
  $limit = 'LIMIT ' . $_POST["limit"];

  //choosing sort direction for the sorting of materials
  if($_POST["sort_direction"] > 0){
    $sort_direction = " ASC";
  }
  else{
    $sort_direction = " DESC";
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
    default:
      $sort .= "mat_id DESC";
      break;
  }
  $start_num = $_POST["limit"] * ($_POST["page-number"] - 1); //compute starting row of the current page
  $start = "WHERE row_number > $start_num";   //create condition for the start of the table page
  $subquery = "SELECT mat_id, (row_number() OVER ($sort))row_number FROM MATERIAL $condition";  //subquery to retrieve material information
  $query = "SELECT c.* FROM (SELECT a.* FROM ($subquery)a $start $limit)b INNER JOIN MATERIAL c on b.mat_id=c.mat_id"; //main query to retrieve information from the table created by the subquery
  $result = $conn->query($query);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>