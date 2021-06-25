<?php
  //Function for updating staff table.
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  $query = "SELECT * FROM STAFF";
  //Case when filter table is set to "active".
  if($_POST['active-filter'] == 'active'){
    $query .= " WHERE staff_active = 1";
  }
  //Case when filter table is set to "deleted".
  if($_POST['active-filter'] == 'deleted'){
    $query .= " WHERE staff_active = 0";
  }
  //Order the rows by staff type and username.
  $query .= " ORDER BY staff_type, staff_username";
  //Submit SQL query.
  $result = $conn->query($query);
  $data = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($data);
?>
