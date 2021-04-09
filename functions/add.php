<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	function add($conn, $table, $info){
		$columns = "";
		$values = "";
		foreach ($info as $column => $value) {
			$columns .= "$column,";
			$values .= "'$value',";
		}
		$columns = substr($columns, 0, -1);		//removes the last comma from end of columns string
		$values = substr($values, 0, -1);		//removes the last comma from end of values string
		$sql = "INSERT INTO $table ($columns) VALUES ($values);";
		$conn->query($sql);
	}
?>