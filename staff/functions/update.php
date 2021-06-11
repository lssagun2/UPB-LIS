<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $query = "SELECT * FROM STAFF";
  if($_POST['active-filter'] == 'active'){
    $query .= " WHERE staff_active = 1";
  }
  if($_POST['active-filter'] == 'deleted'){
    $query .= " WHERE staff_active = 0";
  }
  $query .= " ORDER BY staff_type, staff_username";
  $result = $conn->query($query);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>
