<?php
  require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $year1 = $_POST['year1'];
  $year2 = $_POST['year2'];
  $sql = "
    SELECT
      SUM(CASE WHEN inv_$year1 = 1 THEN 1 ELSE 0 END) AS inventoried_year1,
      SUM(CASE WHEN inv_$year1 = 0 THEN 1 ELSE 0 END) AS not_inventoried_year1,
      SUM(CASE WHEN inv_$year1 = -1 THEN 1 ELSE 0 END) AS not_acquired_year1,
      SUM(CASE WHEN inv_$year2 = 1 THEN 1 ELSE 0 END) AS inventoried_year2,
      SUM(CASE WHEN inv_$year2 = 0 THEN 1 ELSE 0 END) AS not_inventoried_year2,
      SUM(CASE WHEN inv_$year2 = -1 THEN 1 ELSE 0 END) AS not_acquired_year2,
      SUM(CASE WHEN inv_$year1 = 1 AND inv_$year2 = 1 THEN 1 ELSE 0 END) AS category_3,
      SUM(CASE WHEN inv_$year1 = 1 AND inv_$year2 != 1 THEN 1 ELSE 0 END) AS category_2,
      SUM(CASE WHEN inv_$year1 != 1 AND inv_$year2 = 1 THEN 1 ELSE 0 END) AS category_1,
      SUM(CASE WHEN inv_$year1 != 1 AND inv_$year2 != 1 THEN 1 ELSE 0 END) AS category_0
    FROM INVENTORY;
  ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo json_encode($row);
?>