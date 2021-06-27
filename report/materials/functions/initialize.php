<?php
  require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $temp = $_POST["ajax"];
  $filters = ['mat_circ_type', 'mat_type', 'mat_status', 'mat_location'];
  $data = [];
  //fetch all distinct categories in each filter along with the material count for each category
  foreach($filters as $filter){
    $sql = "SELECT DISTINCT $filter, COUNT(1) AS count FROM MATERIAL WHERE $filter != '' GROUP BY $filter";
    $result = $conn->query($sql);
    $data[$filter] = $result->fetch_all(MYSQLI_ASSOC);
  }
  //query to fetch the total number of materials and the total number of distinct titles in the database
  $sql = "SELECT COUNT(count) AS unique_titles, SUM(count) AS total_materials FROM (SELECT COUNT(mat_title) AS count FROM MATERIAL GROUP BY mat_title)a";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $data = array_merge($data, $row); //merge all the data gathered from the distinct filters with the total number of materials and distinct titles
  echo json_encode($data);
?>