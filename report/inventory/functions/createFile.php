<?php
  session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  date_default_timezone_set("Asia/Manila");
  $data = [];
  $year = date('Y');
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);
	$mat_query = "(SELECT * FROM MATERIAL WHERE";
	if(!empty($filter)){
    foreach($filter as $column => $value){
      $mat_query .= " $column='$value' AND";
    }
    $mat_query = substr($mat_query, 0, -4);
		$mat_query .= ")";
  }
	else{
		$mat_query = "";
	}
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
      $sort .= "staff_id_$year $sort_direction";
    default:
      $sort .= "date_$year $sort_direction";
      break;
  }
  //query for inventoried materials
  if($_POST["category"] == "inventoried"){
    $title = [$year . ' Inventory Report (Inventoried Materials)'];
    $total_materials = ['Number of Inventoried Materials:'];
    $data['filename'] = $year . ' Inventory Report (Inventoried Materials).csv';
    $columns = ['Date Inventoried', 'Time Inventoried', 'Inventoried By', 'Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Source', 'Location', 'Last Year Inventoried'];
    $inv_query = "(SELECT mat_id, date_$year, staff_id_$year FROM INVENTORY WHERE inv_$year = 1)";
    $query = "
      SELECT DATE_FORMAT(date_$year, '%M %e, %Y') AS inv_date, DATE_FORMAT(date_$year, '%r') AS inv_time, CONCAT(staff_firstname, ' ', staff_lastname) AS name, mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_source, mat_location, mat_lastinv_year
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
        INNER JOIN STAFF ON INVENTORY.staff_id_$year = STAFF.staff_id
      $sort";
  }
  //query for materials not inventoried
  else{
    $title = [$year . ' Inventory Report (Not Inventoried Materials)'];
    $total_materials = ['Number of Not Inventoried Materials:'];
    $data['filename'] = $year . ' Inventory Report (Not Inventoried Materials).csv';
    $columns = ['Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Source', 'Location', 'Last Year Inventoried'];
    $inv_query = "(SELECT mat_id, date_$year FROM INVENTORY WHERE inv_$year = 0)";
    $query = "
      SELECT mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_source, mat_location, mat_lastinv_year
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
      $sort";
  }
  $result = $conn->query($query);
  $materials = $result->fetch_all();
  $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/report/tables/";
  $filename = 'report' . $_SESSION["staff_id"] . '.csv';
  unlink($directory.$filename);
  $file = fopen($directory.$filename, 'w');
  fputcsv($file, $title);
  fputcsv($file, ['Date Created:', date('M d, Y')]);
  fputcsv($file, ['Time Created:', date('g:i:s A')]);
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
  array_push($total_materials, $result->num_rows);
  fputcsv($file, $total_materials);
  fputcsv($file, []);
  fputcsv($file, $columns);
  foreach ($materials as $material) {
      fputcsv($file, $material);
  }
  fclose($file);
  $data['file'] = $filename;
  echo json_encode($data);
?>
