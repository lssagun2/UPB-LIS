<div class = "modal" id = "staff">
  <?php 
    $sql = "SELECT * FROM STAFF WHERE staff_id = {$_SESSION['staff_id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  ?>
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "staff" method = "POST">
    <div class = "container" style = "overflow-y: auto; height: 480px;">
      <h1 class = "modal-title">Update My Information</h1>
      <input type="hidden" name="function" id = "staff_function" value = "">

      <input type = "hidden" id = "staff_id" name = "staff_id" value = "<?php echo $row["staff_id"]; ?>">

      <label for = "username">Username</label>
      <input type = "text" id = "staff_username" name = "staff_username" value="<?php echo $row["staff_username"]; ?>">

      <label for = "firstname">First Name</label>
      <input type = "text" id = "staff_firstname" name = "staff_firstname" placeholder = "First Name.." value="<?php echo $row["staff_firstname"] ?>">

      <label for = "lastname">Last Name</label>
      <input type = "text" id = "staff_lastname" name = "staff_lastname" placeholder = "Last Name.." value="<?php echo $row["staff_lastname"] ?>">

      <label for = "password">Password</label>
      <input type = "password" id = "staff_password" name = "staff_password" placeholder = "Password.." value="<?php echo $row["staff_password"] ?>">

      <label for = "password">Confirm Password</label>
      <input type = "password" id = "confirm_password" name = "confirm_password" placeholder = "Confirm Password.." value="<?php echo $row["staff_password"] ?>">

      <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtn">Cancel</button>
      <button type = "button" class = "modalbtn" id = "edit-staff">Save changes</button>
    </div>
  </form>
</div>