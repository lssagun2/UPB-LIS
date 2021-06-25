<?php
	//Contains SQL query for editing specific row in the Database.
	function edit($conn, $table, $id, $change){
		$edit = "";
		//setting string for $primary_key
		if($table === "MATERIAL" || $table === "INVENTORY"){
			$primary_key = "mat_id";
		}
		else if($table === "STAFF"){
			$primary_key = "staff_id";
		}
		//compiling all column names and data values for edit query.
		foreach($change as $column => $value){
			$edit .= "$column = '$value',";
		}
		$edit = substr($edit, 0, -1);
		//SQL query for editing data.
		$sql = "UPDATE $table SET $edit WHERE $primary_key = $id";
		$conn->query($sql);
	}
?>