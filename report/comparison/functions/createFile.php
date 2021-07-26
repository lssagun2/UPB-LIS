<?php
  session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  date_default_timezone_set("Asia/Manila");
  $data = [];
	$year1 = intval($_POST["year1"]);
  $prev_year = $year1 - 1;
	$year2 = intval($_POST["year2"]);
	$comparison = filter_var($_POST["comparison"], FILTER_VALIDATE_BOOLEAN);
	if(!$comparison){   //report consists of information only for a single year
    switch($_POST['category']){
      //create title, total materials, filename when stored, and the Inventory table query depending on the category of the report
      case "inventoried":
        $title = [$year1." Inventory Report (Inventoried Materials)"];
        $total_materials = ["Number of Inventoried Materials:"];
        $data['filename'] = $year1." Inventory Report (Inventoried Materials).csv";
        $inv_query = "(SELECT mat_id, date_$year1, staff_id_$year1 FROM INVENTORY WHERE inv_$year1 = 1)";
        break;
      case "not_inventoried":
        $title = [$year1." Inventory Report (Not Inventoried Materials)"];
        $total_materials = ["Number of Not Inventoried Materials:"];
        $data['filename'] = $year1." Inventory Report (Not Inventoried Materials).csv";
        $inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE inv_$year1 = 0)";
        break;
      case "not_acquired":
        $title = [$year1." Inventory Report (Not Acquired Materials)"];
        $total_materials = ["Number of Not Acquired Materials:"];
        $data['filename'] = $year1." Inventory Report (Not Acquired Materials).csv";
        $inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE inv_$year1 = -1)";
        break;
      case "new_acquired":
        $title = [$year1." Inventory Report (Newly Acquired Materials)"];
        $total_materials = ["Number of Newly Acquired Materials:"];
        $data['filename'] = $year1." Inventory Report (Newly Acquired Materials).csv";
        $inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE inv_$prev_year = -1 AND inv_$year1 != -1)";
        break;
      default: break;
    }
	}
	else{ 
		$inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE ";
		switch(intval($_POST["category"])){
      //create title, total materials, filename when stored, and the Inventory table query depending on the category of the report
			case 0:
        $title = [$year1.",".$year2." Comparison Report (Materials Not Inventoried in Both ".$year1." and ".$year2.")"];
        $total_materials = ["Number of Materials Not Inventoried in Both ".$year1." and ".$year2.":"];
        $data['filename'] = $year1.",".$year2." Comparison Report (Not Inventoried in both ".$year1." and ".$year2.").csv";
				$inv_query .= "inv_$year1 = 0 AND inv_$year2 = 0)";
				break;
			case 1:
        $title = [$year1." ".$year2." Comparison Report (Materials Inventoried in ".$year2." Only)"];
        $total_materials = ["Number of Materials Inventoried in ".$year2." Only:"];
        $data['filename'] = $year1." ".$year2." Comparison Report (Inventoried in ".$year2." only).csv";
				$inv_query .= "inv_$year1 = 0 AND inv_$year2 = 1)";
				break;
			case 2:
        $title = [$year1." ".$year2." Comparison Report (Materials Inventoried in ".$year1." Only)"];
        $total_materials = ["Number of Materials Inventoried in ".$year1." Only:"];
        $data['filename'] = $year1." ".$year2." Comparison Report (Inventoried in ".$year1." only).csv";
				$inv_query .= "inv_$year1 = 1 AND inv_$year2 = 0)";
				break;
			case 3:
        $title = [$year1.",".$year2." Comparison Report (Materials Inventoried in Both ".$year1." and ".$year2.")"];
        $total_materials = ["Number of Materials Inventoried in Both ".$year1." and ".$year2.":"];
        $data['filename'] = $year1.",".$year2." Comparison Report (Inventoried in Both ".$year1." and ".$year2.").csv";
				$inv_query .= "inv_$year1 = 1 AND inv_$year2 = 1)";
				break;
			default: break;
		}
	}
  //create the Material table subquery
	$mat_query = "(SELECT * FROM MATERIAL WHERE";
  //create the filter part of the where clause of the subquery
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);  //remove empty elements from array
	if(!empty($filter)){
    foreach($filter as $column => $value){
      $mat_query .= " $column='$value' AND";
    }
    $mat_query = substr($mat_query, 0, -4);
    //append search information to the where clause of the subquery
    if($_POST["search-value"] != ""){
      $mat_query .= " AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
    $mat_query .= ")";
  }
  else{
    //create where clause from the search information
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
    $sort_lines = ['', $_POST["sort"], 'Ascending'];
  }
  else{
    $sort_direction = "DESC";
    $sort_lines = ['', $_POST["sort"], 'Descending'];
  }
  $sort_header = ["Sorted by:"];
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
    case "Inventory Item Number":   //sorting by inventory item number
      $sort .= "mat_inv_num = '' ASC, mat_inv_num $sort_direction";
      break;
    case "Property Inventory Number":   //sorting by property inventory number
      $sort .= "mat_property_inv_num = '' ASC, mat_property_inv_num $sort_direction";
      break;
    case "Last Year Inventoried":   //sorting by last year inventoried
      $sort .= "mat_lastinv_year = 0 ASC, mat_lastinv_year $sort_direction";
      break;
    case "Staff Name":    //sorting by staff name of the one who inventoried the material
      $sort .= "staff_id_$year $sort_direction";
      break;
    case "Inventory Date":  //sorting by the date of inventory
      $sort .= "DATE(date_$year) $sort_direction";
      break;
    default:
      $sort .= "mat_id $sort_direction";    //default sorting if by material ID in descending order
      $sort_header = ["Sorted by:", "none"];  //there is no specific sorting of materials
      unset($sort_lines);
      break;
  }
  $start_num = $_POST["limit"] * ($_POST["page-number"] - 1);   //determine the row number of starting material given limit and page number
  $start = "WHERE row_number > $start_num";   //start from the specific row number
   //creation of the columns and main query depending on the category of the chosen table
  if(!$comparison && intval($_POST["category"]) === 1){
     $columns = ['Date Inventoried', 'Time Inventoried', 'Inventoried By', 'Accession Number', 'Call Number', 'Title', 'Author', 'Publisher', 'Volume', 'Edition', 'Publication Year', 'Source', 'Price', 'Donor', 'Barcode', 'Circulation Type', 'Type', 'Status', 'Location',  'Supplier', 'Acquisition Date', 'Inventory Item Number', 'Last Year Inventoried', 'Remarks'];
    $query = "
      SELECT DATE_FORMAT(date_$year1, '%M %e, %Y') AS inv_date, DATE_FORMAT(date_$year1, '%r') AS inv_time, CONCAT(staff_firstname, ' ', staff_lastname) AS name, mat_acc_num, mat_call_num, mat_title, mat_author, mat_publisher, mat_volume, mat_edition, mat_pub_year, mat_source, CONCAT(mat_price_currency, ' ', mat_price_value) AS mat_price, mat_donor, mat_barcode, mat_circ_type, mat_type, mat_status, mat_location, mat_supplier, (CASE WHEN mat_acquisition_date = '0000-00-00' THEN '' ELSE mat_acquisition_date END) AS mat_acquisition_date, mat_inv_num, (CASE WHEN mat_lastinv_year = '0' THEN '' ELSE mat_lastinv_year END) AS mat_lastinv_year, mat_remarks
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
        INNER JOIN STAFF ON INVENTORY.staff_id_$year1 = STAFF.staff_id
      $sort";
  }
  else{
    $columns = ['Accession Number', 'Call Number', 'Title', 'Author', 'Publisher', 'Volume', 'Edition', 'Publication Year', 'Source', 'Price', 'Donor', 'Barcode', 'Circulation Type', 'Type', 'Status', 'Location',  'Supplier', 'Acquisition Date', 'Inventory Item Number', 'Last Year Inventoried', 'Remarks'];
    $query = "
      SELECT mat_acc_num, mat_call_num, mat_title, mat_author, mat_publisher, mat_volume, mat_edition, mat_pub_year, mat_source, CONCAT(mat_price_currency, ' ', mat_price_value) AS mat_price, mat_donor, mat_barcode, mat_circ_type, mat_type, mat_status, mat_location, mat_supplier, (CASE WHEN mat_acquisition_date = '0000-00-00' THEN '' ELSE mat_acquisition_date END) AS mat_acquisition_date, mat_inv_num, (CASE WHEN mat_lastinv_year = '0' THEN '' ELSE mat_lastinv_year END) AS mat_lastinv_year, mat_remarks
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id";
  }
  $result = $conn->query($query);
  $materials = $result->fetch_all();
  $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/report/common/";
  $filename = 'report' . $_SESSION["staff_id"] . '.csv';
  unlink($directory.$filename);
  $file = fopen($directory.$filename, 'w');
  fputcsv($file, $title);   //add title to the CSV file
  fputcsv($file, ['Date Created:', date('M d, Y')]);  //add date to the CSV file
  fputcsv($file, ['Time Created:', date('g:i:s A')]);  //add time to the CSV file
  //add filter information to the CSV file
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
  //add search information to the CSV file
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
  //add sort information to the CSV file
  fputcsv($file, $sort_header);
  if(isset($sort_lines)){
    fputcsv($file, ['', "Column", "Order"]);
    fputcsv($file, $sort_lines);
  }
  array_push($total_materials, $result->num_rows);  //add number of materials
  fputcsv($file, $total_materials);
  fputcsv($file, []);
  fputcsv($file, $columns); //add column names
  foreach ($materials as $material) {
      fputcsv($file, $material); //add material information in a row
  }
  fclose($file);
  $data['file'] = $filename;
  echo json_encode($data);
?>
