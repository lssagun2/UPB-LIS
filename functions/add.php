<?php
	//Contains SQL query for adding row inside Database.
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
	function add($conn, $table, $info){
		$columns = "";
		$values = "";
		//compiling all column names and data values for query.
		foreach ($info as $column => $value) {
			$columns .= "$column,";
			$values .= "'$value',";
		}
		$columns = substr($columns, 0, -1);		//removes the last comma from end of columns string
		$values = substr($values, 0, -1);		//removes the last comma from end of values string
		//SQL query for adding data.
		$sql = "INSERT INTO $table ($columns) VALUES ($values);";
		$conn->query($sql);
	}
?>