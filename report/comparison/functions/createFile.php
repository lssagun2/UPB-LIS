<?php
  session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  date_default_timezone_set("Asia/Manila");
  $data = [];
	$year1 = intval($_POST["year1"]);
	$year2 = intval($_POST["year2"]);
	$comparison = filter_var($_POST["comparison"], FILTER_VALIDATE_BOOLEAN);
	if(!$comparison){
		if(intval($_POST["category"]) === 1){
      $title = [$year1." Inventory Report (Inventoried Materials)"];
      $total_materials = ["Number of Inventoried Materials:"];
      $data['filename'] = $year1." Inventory Report (Inventoried Materials).csv";
			$inv_query = "(SELECT mat_id, date_$year1, staff_id_$year1 FROM INVENTORY WHERE inv_$year1 = {$_POST['category']})";
		}
		else if(intval($_POST["category"]) === 0){
      $title = [$year1." Inventory Report (Not Inventoried Materials)"];
      $total_materials = ["Number of Not Inventoried Materials:"];
      $data['filename'] = $year1." Inventory Report (Not Inventoried Materials).csv";
			$inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE inv_$year1 = {$_POST['category']})";
		}
    else{
      $title = [$year1." Inventory Report (Not Acquired Materials)"];
      $total_materials = ["Number of Not Acquired Materials:"];
      $data['filename'] = $year1." Inventory Report (Not Acquired Materials)csv";
      $inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE inv_$year1 = {$_POST['category']})";
    }
	}
	else{
		$inv_query = "(SELECT mat_id, date_$year1 FROM INVENTORY WHERE ";
		switch(intval($_POST["category"])){
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
		$mat_query .= ")";
  }
	else{
		$mat_query = "";
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
  if(!$comparison && intval($_POST["category"]) === 1){
     $columns = ['Date Inventoried', 'Time Inventoried', 'Inventoried By', 'Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Source', 'Location', 'Last Year Inventoried'];
    $query = "
      SELECT DATE_FORMAT(date_$year1, '%M %e, %Y') AS inv_date, DATE_FORMAT(date_$year1, '%r') AS inv_time, CONCAT(staff_firstname, ' ', staff_lastname) AS name, mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_source, mat_location, mat_lastinv_year
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id
        INNER JOIN STAFF ON INVENTORY.staff_id_$year1 = STAFF.staff_id
      $sort";
  }
  else{
    $columns = ['Accession Number', 'Barcode', 'Call Number', 'Title', 'Author', 'Volume', 'Year', 'Edition', 'Publisher', 'Publication Year', 'Circulation Type', 'Type', 'Status', 'Source', 'Location', 'Last Year Inventoried'];
    $query = "
      SELECT mat_acc_num, mat_barcode, mat_call_num, mat_title, mat_author, mat_volume, mat_year, mat_edition, mat_publisher, mat_pub_year, mat_circ_type, mat_type, mat_status, mat_source, mat_location, mat_lastinv_year
      FROM {$inv_query}INVENTORY
        INNER JOIN {$mat_query}MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id";
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
