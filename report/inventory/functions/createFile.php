<?php
  session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  date_default_timezone_set("Asia/Manila");
  $data = [];
  $year = $_POST['year'];
  $prev_year = $year - 1;
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
    case "Accession Number":
      $sort .= "mat_acc_num = '' ASC, mat_acc_num1 $sort_direction, mat_acc_num2 $sort_direction, mat_acc_num $sort_direction";
      break;
    case "Barcode":
      $sort .= "mat_barcode = '' ASC, mat_barcode $sort_direction";
      break;
    case "Call Number":
      $sort .= "mat_call_num = '' ASC, mat_call_num1 $sort_direction, mat_call_num2 $sort_direction, mat_call_num3 $sort_direction, mat_call_num $sort_direction";
      break;
    case "Title":
      $sort .= "mat_title = '' ASC, mat_title $sort_direction";
      break;
    case "Staff Name":
      $sort .= "staff_id_$year $sort_direction";
      break;
    case "Inventory Date":
      $sort .= "date_$year $sort_direction";
      break;
    case "Inventory Item Number":
      $sort .= "mat_inv_num = '' ASC, mat_inv_num $sort_direction";
      break;
    default:
      $sort .= "MATERIAL.mat_id $sort_direction";
      $sort_header = ["Sorted by:", "none"];
      unset($sort_lines);
      break;
  }
  if($_POST['category'] === "inventoried"){
    $title = [$year . ' Inventory Report (Inventoried Materials)'];
    $total_materials = ['Number of Inventoried Materials:'];
    $data['filename'] = $year . ' Inventory Report (Inventoried Materials).csv';
    $columns = ['Date Inventoried', 'Time Inventoried', 'Inventoried By', 'Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Source', 'Location', 'Inventory Item Number', 'Last Year Inventoried'];
    $inv_query = "(SELECT mat_id, date_$year, staff_id_$year FROM INVENTORY WHERE inv_$year = 1)";
    $query = "
      SELECT DATE_FORMAT(date_$year, '%M %e, %Y') AS inv_date, DATE_FORMAT(date_$year, '%r') AS inv_time, CONCAT(staff_firstname, ' ', staff_lastname) AS name, mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_source, mat_location, mat_inv_num, mat_lastinv_year
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
        INNER JOIN STAFF ON INVENTORY.staff_id_$year = STAFF.staff_id
      $sort
    ";
  }
  else{
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
    $columns = ['Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Source', 'Location', 'Inventory Item Number', 'Last Year Inventoried'];
    $query = "
      SELECT mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_source, mat_location, mat_inv_num, mat_lastinv_year
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
      $sort
    ";
  }
  $result = $conn->query($query);
  $materials = $result->fetch_all();
  $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/report/common/";
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
      default: break;
    }
  }
  else{
    fputcsv($file, ["Search:", "none"]);
  }
  fputcsv($file, $sort_header);
  if(isset($sort_lines)){
    fputcsv($file, ['', "Column", "Order"]);
    fputcsv($file, $sort_lines);
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
