<?php
  require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $year1 = $_POST['year1'];
  $year2 = $_POST['year2'];
  $prev_year1 = $year1 - 1;
  $prev_year2 = $year2 - 1;
  $new_acquired = "";
  $sql = "SHOW COLUMNS FROM INVENTORY LIKE 'inv_$prev_year1'";
  $result = $conn->query($sql);
  if($result->num_rows != 0){
      $new_acquired .= "SUM(CASE WHEN inv_$prev_year1 = -1 AND inv_$year1 != -1 THEN 1 ELSE 0 END) AS new_acquired1,";
  }
  $sql = "SHOW COLUMNS FROM INVENTORY LIKE 'inv_$prev_year2'";
  $result = $conn->query($sql);
  if($result->num_rows != 0){
      $new_acquired .= "SUM(CASE WHEN inv_$prev_year2 = -1 AND inv_$year2 != -1 THEN 1 ELSE 0 END) AS new_acquired2,";
  }
  $sql = "
    SELECT
      SUM(CASE WHEN inv_$year1 = 1 THEN 1 ELSE 0 END) AS inventoried_year1,
      SUM(CASE WHEN inv_$year1 = 0 THEN 1 ELSE 0 END) AS not_inventoried_year1,
      SUM(CASE WHEN inv_$year1 = -1 THEN 1 ELSE 0 END) AS not_acquired_year1,
      SUM(CASE WHEN inv_$year2 = 1 THEN 1 ELSE 0 END) AS inventoried_year2,
      SUM(CASE WHEN inv_$year2 = 0 THEN 1 ELSE 0 END) AS not_inventoried_year2,
      SUM(CASE WHEN inv_$year2 = -1 THEN 1 ELSE 0 END) AS not_acquired_year2,
      $new_acquired
      SUM(CASE WHEN inv_$year1 = 1 AND inv_$year2 = 1 THEN 1 ELSE 0 END) AS category_3,
      SUM(CASE WHEN inv_$year1 = 1 AND inv_$year2 = 0 THEN 1 ELSE 0 END) AS category_2,
      SUM(CASE WHEN inv_$year1 = 0 AND inv_$year2 = 1 THEN 1 ELSE 0 END) AS category_1,
      SUM(CASE WHEN inv_$year1 = 0 AND inv_$year2 = 0 THEN 1 ELSE 0 END) AS category_0
    FROM INVENTORY;
  ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo json_encode($row);
?>