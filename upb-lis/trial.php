<?php
	require "config.php";
	$year = date("Y");
    $sql = "SELECT INVENTORY.mat_id, mat_acc_num, mat_barcode, inv_$year, date_$year, staff_id_$year FROM INVENTORY INNER JOIN MATERIAL ON INVENTORY.mat_id = MATERIAL.mat_id WHERE inv_$year = 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    var_dump($row);
?>