<?php
	function edit($conn, $table, $id, $change){
		$edit = "";
		if($table === "MATERIAL" || $table === "INVENTORY"){
			$primary_key = "mat_id";
		}
		else if($table === "STAFF"){
			$primary_key = "staff_id";
		}
		foreach($change as $column => $value){
			$edit .= "$column = '$value',";
		}
		$edit = substr($edit, 0, -1);
		$sql = "UPDATE $table SET $edit WHERE $primary_key = $id";
		$conn->query($sql);
	}
?>