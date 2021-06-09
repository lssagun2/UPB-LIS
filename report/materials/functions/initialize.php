<?php
  require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $temp = $_POST["ajax"];
  $filters = ['mat_circ_type', 'mat_type', 'mat_status', 'mat_location'];
  $data = [];
  foreach($filters as $filter){
    $sql = "SELECT DISTINCT $filter, COUNT(1) AS count FROM MATERIAL GROUP BY $filter";
    $result = $conn->query($sql);
    $data[$filter] = $result->fetch_all(MYSQLI_ASSOC);
  }
  $sql = "SELECT COUNT(count) AS unique_titles, SUM(count) AS total_materials from (SELECT COUNT(mat_title) as count FROM MATERIAL GROUP BY mat_title)a";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $data = array_merge($data, $row);
  echo json_encode($data);
?>