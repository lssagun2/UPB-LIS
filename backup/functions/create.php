<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	date_default_timezone_set('Asia/Manila');
	$data = [];
	$directory = $_SERVER['DOCUMENT_ROOT'] . "/upb-lis/backup/files/";
	if($_POST['backup-type'] == 'client'){
		$file = $directory . "client/" . $_SESSION['staff_id'] . ".sql";
		$data['file'] = $_SESSION['staff_id'] . ".sql";
		$data['filename'] = date('Y M j, g;i A') . ".sql";
	}
	else{
		$file = $_SERVER['DOCUMENT_ROOT'] . "/upb-lis/backup/files/server/" . date('Y M j, g;i;s A') . ".sql";
	}
	$tables = array();
	$sql = "SHOW TABLES";
	$query = $conn->query($sql);
	while($row = $query->fetch_row()){
		$tables[] = $row[0];
	}
	$outsql = '';
	foreach ($tables as $table) {
		$sql = "SHOW CREATE TABLE $table";
		$query = $conn->query($sql);
		$row = $query->fetch_row();
		$outsql .= "\n\n" . $row[1] . ";\n\n";
		$sql = "SELECT * FROM $table";
		$query = $conn->query($sql);
		$columnCount = $query->field_count;
		for ($i = 0; $i < $columnCount; $i ++) {
			while ($row = $query->fetch_row()) {
				$outsql .= "INSERT INTO $table VALUES(";
				for ($j = 0; $j < $columnCount; $j ++) {
					$row[$j] = $row[$j];
					if (isset($row[$j])) {
						$outsql .= '"' . $row[$j] . '"';
					} else {
						$outsql .= '""';
					}
					if ($j < ($columnCount - 1)) {
						$outsql .= ',';
					}
				}
				$outsql .= ");\n";
			}
		}
		$outsql .= "\n"; 
	}
    $fileHandler = fopen($file, 'w+');
    fwrite($fileHandler, $outsql);
    fclose($fileHandler);
    echo json_encode($data);
?>