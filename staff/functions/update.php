<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
?>
  <thead>
    <tr>
      <th width="15%" style = "border-radius: 1em 0 0 0;">Username</th>
      <th width="20%">First Name</th>
      <th width="25%">Last Name</th>
      <th width="20%">Password</th>
      <th width="20%">Type</th>
      <th width="10%" style = "border-radius: 0 1em 0 0;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM STAFF";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){
    ?>
  <tr align="center">
    <td style='display:none;'><?php echo $row['staff_id'] ?></td> 
    <td><?php echo $row['staff_username'] ?></td>
    <td><?php echo $row['staff_firstname'] ?></td>
    <td><?php echo $row['staff_lastname'] ?></td>
    <td><?php echo $row['staff_password'] ?></td>
    <td><?php echo $row['staff_type'] ?></td>
                    
    <td>
      <button id = 'deleteStaffTable' class = 'edit' style = 'width: 50px; height: 50px; color: #000;'><i class="fas fa-trash-alt"></i></button>
      <button id = 'editStaffTable' class = 'edit' style = 'width: 50px; height: 50px; color: #000;'><i class = 'fas fa-edit'></i></button>
    </td>
  </tr>
    <?php } ?>
  </tbody>
