<?php
  require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $temp = $_POST["ajax"];
  $sql = "SELECT COUNT(count) AS unique_titles, SUM(count) AS total_materials from (SELECT COUNT(mat_title) as count FROM MATERIAL GROUP BY mat_title)a";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo json_encode($row);
?>