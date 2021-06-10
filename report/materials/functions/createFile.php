<?php
  session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  date_default_timezone_set("Asia/Manila");
  //creation of the condition part of the query given by the filters
  $filter = [
    "mat_circ_type" => $_POST["circtype-filter"],
    "mat_type" => $_POST["type-filter"],
    "mat_status" => $_POST["status-filter"],
    "mat_location" => $_POST["location-filter"]
  ];
  $filter = array_filter($filter);
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
  if($_POST["search-value"] != ""){
    if(!empty($filter)){
      $condition .= "AND " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
    else{
      $condition = "WHERE " . $_POST["search-column"] . " LIKE '%" . $_POST["search-value"] . "%'";
    }
    $search_lines = [["Search:"], ["", "Column", "Search string"]];
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
      default: break;
    }
  }
  else{
    $search_lines = [["Search:", "none"]];
  }
  //creation of the sorting part of the query
  $sort = "ORDER BY ";
  if($_POST["sort_direction"] > 0){
    $sort_direction = "ASC";
  }
  else{
    $sort_direction = "DESC";
  }
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
    case "Inventory Item Number":
      $sort .= "mat_inv_num = '' ASC, mat_inv_num $sort_direction";
      break;
    default:
      $sort .= "mat_id $sort_direction";
      break;
  }
  $query = "SELECT mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_source, mat_location, mat_inv_num, mat_lastinv_year FROM MATERIAL $condition $sort";
  $result = $conn->query($query);
  $materials = $result->fetch_all(MYSQLI_ASSOC);
  $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/report/common/";
  $filename = 'report' . $_SESSION["staff_id"] . '.csv';
  unlink($directory.$filename);
  $file = fopen($directory.$filename, 'w');
  fputcsv($file, ['Materials Report']);
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
  foreach($search_lines as $line){
    fputcsv($file, $line);
  }
  fputcsv($file, ["Number of Materials:", $result->num_rows]);
  fputcsv($file, []);
  fputcsv($file, ['Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Source', 'Location', 'Inventory Item Number', 'Last Year Inventoried']);
  foreach ($materials as $material) {
      fputcsv($file, $material);
  }
  fclose($file);
  $data['file'] = $filename;
  $data['filename'] = "Materials Report.csv";
  echo json_encode($data);
?>