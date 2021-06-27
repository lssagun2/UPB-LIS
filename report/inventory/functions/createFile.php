<?php
  session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  date_default_timezone_set("Asia/Manila");
  $data = [];
  $year = $_POST['year'];
  $prev_year = $year - 1; //compute for the previous year necessary to determine new acquisitions
  //creation of the filter part of the subquery for Material table
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);  //remove empty elements of the array
  //creating the subquery for Material table
	$mat_query = "(SELECT * FROM MATERIAL WHERE";
	if(!empty($filter)){ //there are applied filters
    foreach($filter as $column => $value){
      $mat_query .= " $column='$value' AND";
    }
    $mat_query = substr($mat_query, 0, -4);
    //search string part of the subquery for material
    if($_POST["search-value"] != ""){
      $mat_query .= " AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
    $mat_query .= ")";
  }
  else{ //there are no filters
    //search string of the subquery for material
    if($_POST["search-value"] != ""){
      $mat_query .= " " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%')";
    }
    else{
      $mat_query = "";
    }
  }
  //choosing the sort direction of the table as well as creating the sort part of the CSV file
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
    case "Property Inventory Number": //sorting by property inventory number
      $sort .= "mat_property_inv_num = '' ASC, mat_property_inv_num $sort_direction";
      break;
    case "Last Year Inventoried": //sorting by last year inventoried
      $sort .= "mat_lastinv_year = 0 ASC, mat_lastinv_year $sort_direction";
      break;
    case "Staff Name":  //sorting by staff name who inventoried a material
      $sort .= "staff_id_$year $sort_direction";
      break;
    case "Inventory Date":  //sorting by the date of inventory
      $sort .= "DATE(date_$year) $sort_direction";
      break;
    default:
      $sort .= "MATERIAL.mat_id DESC";  //default sorting is mat_id in descending order
      $sort_header = ["Sorted by:", "none"];  //the materials are not sorted by user
      unset($sort_lines);
      break;
  }
  //creating title, total materials, filename, and columns when user chose inventoried materials
  if($_POST['category'] === "inventoried"){
    $title = [$year . ' Inventory Report (Inventoried Materials)'];
    $total_materials = ['Number of Inventoried Materials:'];
    $data['filename'] = $year . ' Inventory Report (Inventoried Materials).csv';
    $columns = ['Date Inventoried', 'Time Inventoried', 'Inventoried By', 'Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Location', 'Source', 'Price', 'Acquisition Date', 'Inventory Item Number', 'Property Inventory Number', 'Last Year Inventoried'];
    $inv_query = "(SELECT mat_id, date_$year, staff_id_$year FROM INVENTORY WHERE inv_$year = 1)";
    $query = "
      SELECT DATE_FORMAT(date_$year, '%M %e, %Y') AS inv_date, DATE_FORMAT(date_$year, '%r') AS inv_time, CONCAT(staff_firstname, ' ', staff_lastname) AS name, mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_location, mat_source, CONCAT(mat_price_currency, ' ', mat_price_value) AS mat_price, mat_acquisition_date, mat_inv_num, mat_property_inv_num, mat_lastinv_year
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
        INNER JOIN STAFF ON INVENTORY.staff_id_$year = STAFF.staff_id
      $sort
    ";
  }
  else{ //title, total materials, filename, and columns when user chose otherwise
    switch($_POST['category']){
      case "not_inventoried":
        $title = [$year . ' Inventory Report (Not Inventoried Materials)'];
        $total_materials = ['Number of Not Inventoried Materials:'];
        $data['filename'] = $year . ' Inventory Report (Not Inventoried Materials).csv';
        $inv_query = "(SELECT mat_id, date_$year FROM INVENTORY WHERE inv_$year = 0)";
        break;
      case "not_acquired":
        $title = [$year . ' Inventory Report (Not Acquired Materials)'];
        $total_materials = ['Number of Not Acquired Materials:'];
        $data['filename'] = $year . ' Inventory Report (Not Acquired Materials).csv';
        $inv_query = "(SELECT mat_id, date_$year FROM INVENTORY WHERE inv_$year = -1)";
        break;
      case "new_acquired":
        $title = [$year . ' Inventory Report (Newly Acquired Materials)'];
        $total_materials = ['Number of Newly Acquired Materials:'];
        $data['filename'] = $year . ' Inventory Report (Newly Acquired Materials).csv';
        $inv_query = "(SELECT mat_id, date_$year FROM INVENTORY WHERE inv_$prev_year = -1 AND inv_$year != -1)";
      default: break;
    }
    $columns = ['Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Location', 'Source', 'Price', 'Acquisition Date', 'Inventory Item Number', 'Property Inventory Number', 'Last Year Inventoried'];
    $query = "
      SELECT mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_location, mat_source, CONCAT(mat_price_currency, ' ', mat_price_value) AS mat_price, mat_acquisition_date, mat_inv_num, mat_property_inv_num, mat_lastinv_year
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
      $sort
    "; //common query for not inventoried, not acquired, and newly acquired materials
  }
  $result = $conn->query($query);
  $materials = $result->fetch_all();
  $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/report/common/";
  $filename = 'report' . $_SESSION["staff_id"] . '.csv';  //create CSV file on server based on staff ID
  unlink($directory.$filename);
  $file = fopen($directory.$filename, 'w');
  fputcsv($file, $title); //add title to csv file
  fputcsv($file, ['Date Created:', date('M d, Y')]);  //add date to CSV file
  fputcsv($file, ['Time Created:', date('g:i:s A')]); //add time to CSV file
  //add filter information to CSV file
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
  //add search information to CSV file 
  if($_POST["search-value"] != ""){
    fputcsv($file, ["Search:"]);
    fputcsv($file, ["", "Column", "Search string"]);
    switch($_POST["search-column"]){
      case "mat_title":
        fputcsv($file, ["", "Title", $_POST['search-value']]);
        break;
      case "mat_author":
        fputcsv($file, ["", "Author", $_POST['search-value']]);
        break;
      case "mat_call_num":
        fputcsv($file, ["", "Call Number", $_POST['search-value']]);
        break;
      case "mat_acc_num":
        fputcsv($file, ["", "Accession Number", $_POST['search-value']]);
        break;
      case "mat_publisher":
        fputcsv($file, ["", "Publisher", $_POST['search-value']]);
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
  else{
    fputcsv($file, ["Search:", "none"]);
  }
  //add sort information to CSV file
  fputcsv($file, $sort_header);
  if(isset($sort_lines)){
    fputcsv($file, ['', "Column", "Order"]);
    fputcsv($file, $sort_lines);
  }
  array_push($total_materials, $result->num_rows);
  fputcsv($file, $total_materials); //add total number of materials to CSV file
  fputcsv($file, []);
  fputcsv($file, $columns); //add column names to the table in the CSV file
  foreach ($materials as $material) {
      fputcsv($file, $material);  //add material information in a row
  }
  fclose($file);
  $data['file'] = $filename;
  echo json_encode($data);
?>
