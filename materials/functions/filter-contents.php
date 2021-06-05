<?php
  require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $filters = ['mat_circ_type', 'mat_type', 'mat_status', 'mat_location'];
  $data = [];
  foreach($filters as $filter){
    $sql = "SELECT $filter FROM MATERIAL GROUP BY $filter";
    $result = $conn->query($sql);
    $data[$filter] = $result->fetch_all(MYSQLI_ASSOC);
  }
  echo json_encode($data);
?>