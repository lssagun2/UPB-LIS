<?php
  $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/filters/";
  $filters = ['circ_type', 'type', 'status', 'location'];
  $data = [];
  foreach($filters as $filter){
    $filename = $directory . $filter . '.txt';
    $lines = preg_split('/\r\n|\n|\r/', trim(file_get_contents($filename)));
    $data[$filter] = $lines;
  }
  echo json_encode($data);
?>