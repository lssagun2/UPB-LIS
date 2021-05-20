<?php
  $report = $_POST["report-select"];
  switch ($report) {
    case 'materials':
      header("location: materials/index.php");
      exit;
    case 'inventory':
      header("location: inventory/index.php");
      exit;
    case 'comparison':
      $year1 = $_POST["year1"];
      $year2 = $_POST["year2"];
      header("location: comparison/index.php?year1=$year1&year2=$year2");
      exit;
    default:  break;
  }
?>