<?php
	//function that creates SQL query for deleting information from tables
	function delete($conn, $table, $primarykey, $id){
		$sql = "DELETE FROM $table WHERE $primarykey = '$id'";
		$conn->query($sql);
	}
?>