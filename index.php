<?php
  require "config.php";
  $year = date("Y");
  $sql = "SHOW COLUMNS FROM INVENTORY LIKE '%_year'";
  $result = $conn->query($sql);
  if($result->num_rows == 0){
    $sql = "ALTER TABLE INVENTORY ADD staff_id_$year INT after mat_barcode";
    $conn->query($sql);
    $sql = "ALTER TABLE INVENTORY ADD date_$year DATETIME after mat_barcode";
    $conn->query($sql);
    $sql = "ALTER TABLE INVENTORY ADD inv_$year INT after mat_barcode";
    $conn->query($sql);
  }
  header("location: login/index.php");
?>
