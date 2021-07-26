<?php
  session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  date_default_timezone_set("Asia/Manila");
  //creation of the condition part of the material query given by the filters
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);  //remove empty elements of the array
  //creation of the where clause of the material query from the filter
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
  //creation of the conditions imposed by the search string, if any
  if($_POST["search-value"] != ""){ //add search string to CSV file if user used the search function
    if(!empty($filter)){
      $condition .= "AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";  
    }
    else{
      $condition = "WHERE " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
    $search_lines = [["Search:"], ["", "Column", "Search string"]]; //initialize the header for the search component of the CSV file
    //create search line on CSV file depending on the search column created by the user
    switch($_POST["search-column"]){    
      case "mat_title":
        array_push($search_lines, ["", "Title", $_POST['search-value']]);
        break;
      case "mat_author":
        array_push($search_lines, ["", "Author", $_POST['search-value']]);
        break;
      case "mat_call_num":
        array_push($search_lines, ["", "Call Number", $_POST['search-value']]);
        break;
      case "mat_acc_num":
        array_push($search_lines, ["", "Accession Number", $_POST['search-value']]);
        break;
      case "mat_publisher":
        array_push($search_lines, ["", "Publisher", $_POST['search-value']]);
        break;
      case "mat_source":
        array_push($search_lines, ["", "Source", $_POST['search-value']]);
        break;
      case "mat_inv_num":
        array_push($search_lines, ["", "Inventory Item Number", $_POST['search-value']]);
        break;
      case "mat_property_inv_num":
        array_push($search_lines, ["", "Property Inventory Number", $_POST['search-value']]);
        break;
      default: break;
    }
  }
  else{   //the user did not use the search function
    $search_lines = [["Search:", "none"]];
  }
  //choosing the sort direction and creating the sort lines in the CSV file
  if($_POST["sort_direction"] > 0){
    $sort_direction = "ASC";
    $sort_lines = ['', $_POST["sort"], 'Ascending'];
  }
  else{
    $sort_direction = "DESC";
    $sort_lines = ['', $_POST["sort"], 'Descending'];
  }
  $sort_header = ["Sorted by:"]; //create header for the sorting portion of file
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
    case "Property Inventory Number": //sorting by property number
      $sort .= "mat_property_inv_num = '' ASC, mat_property_inv_num $sort_direction";
      break;
    case "Last Year Inventoried": //sorting by last year inventoried
      $sort .= "mat_lastinv_year = 0 ASC, mat_lastinv_year $sort_direction";
      break;
    default:
      $sort .= "MATERIAL.mat_id DESC"; //set mat_id DESC as default sorting
      $sort_header = ["Sorted by:", "none"];  //the user did not sort the materials
      unset($sort_lines);
      break;
  }
  //creation of the main query to retrieve material information
  $query = "SELECT mat_acc_num, mat_call_num, mat_title, mat_author, mat_publisher, mat_volume, mat_edition, mat_pub_year, mat_source, CONCAT(mat_price_currency, ' ', mat_price_value) AS mat_price, mat_donor, mat_barcode, mat_circ_type, mat_type, mat_status, mat_location, mat_supplier, (CASE WHEN mat_acquisition_date = '0000-00-00' THEN '' ELSE mat_acquisition_date END) AS mat_acquisition_date, mat_inv_num, (CASE WHEN mat_lastinv_year = '0' THEN '' ELSE mat_lastinv_year END) AS mat_lastinv_year, mat_remarks FROM MATERIAL $condition $sort";
  $result = $conn->query($query);
  $materials = $result->fetch_all(MYSQLI_ASSOC);
  $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/report/common/";
  $filename = 'report' . $_SESSION["staff_id"] . '.csv';
  unlink($directory.$filename);
  $file = fopen($directory.$filename, 'w');
  fputcsv($file, ['Materials Report']);   //add title of report
  fputcsv($file, ['Date Created:', date('M d, Y')]);  //add date created
  fputcsv($file, ['Time Created:', date('g:i:s A')]); //add time created
  //add filters to the CSV file if there are any
  if(!empty($filter)){
    fputcsv($file, ["Filters:"]);
    foreach($filter as $column => $value){
      switch ($column) {
        case 'mat_circ_type':
          fputcsv($file, ['', 'Circulation Type:', $value]);
          break;
        case 'mat_type':
          fputcsv($file, ['', 'Type:', $value]);
          break;
        case 'mat_status':
          fputcsv($file, ['', 'Status', $value]);
          break;
        case 'mat_location':
          fputcsv($file, ['', 'Location', $value]);
          break;
        default: break;
      }
    }
  }
  else{
    fputcsv($file, ["Filters:", "none"]);
  }
  //add information about the search information into the CSV file
  foreach($search_lines as $line){
    fputcsv($file, $line);
  }
  fputcsv($file, ["Number of Materials:", $result->num_rows]);  //add number of materials
  fputcsv($file, []); //empty row
  fputcsv($file, ['Accession Number', 'Call Number', 'Title', 'Author', 'Publisher', 'Volume', 'Edition', 'Publication Year', 'Source', 'Price', 'Donor', 'Barcode', 'Circulation Type', 'Type', 'Status', 'Location',  'Supplier', 'Acquisition Date', 'Inventory Item Number', 'Last Year Inventoried', 'Remarks']);  //add column names
  foreach ($materials as $material) {
      fputcsv($file, $material);  //add materials into a row in the CSV file
  }
  fclose($file);
  $data['file'] = $filename;  //filename of the material stored in the server
  $data['filename'] = "Materials Report.csv"; //default file name when downloaded
  echo json_encode($data);  
?>