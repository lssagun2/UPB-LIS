<?php

require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
$sql = "SELECT CONCAT(staff_firstname, ' ', staff_lastname) AS name, staff_type as type FROM STAFF WHERE staff_id=" . $_SESSION['staff_id'];
$result = $conn->query($sql);
$staff = $result->fetch_assoc();
?>
<style>
#staff .container {
  margin: 20px;
  height: 650px;
  padding: 20px;
  overflow-y: hidden;
}

@media (min-width: 2560px){
  #staff .container {
    height: 580px;
    padding: 50px;
    font-size: 1.5em;
  }
}

@media screen and (max-width: 1366px) {
  #staff .modal-content {
    margin-top: -5px;
    height: 550px;
  }

  #staff .container {
    height: 510px;
    padding: 20px;
    overflow-y: auto;
  }
}
</style>

<div class = "modal" id = "staff">
  <?php
    $sql = "SELECT * FROM STAFF WHERE staff_id = {$_SESSION['staff_id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  ?>
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "staff" method = "POST">
    <div class = "container">
      <h1 class = "modal-title">Update My Information</h1>

      <input type="hidden" name="function" id = "staff_function" value = "">

      <input type = "hidden" id = "staff_id" name = "staff_id" value = "<?php echo $row["staff_id"]; ?>">

      <div class = "form-control" id = "usernameform">  <!-- Changes -->
      <label for = "username">Username</label>
      <input style = "width: 100%;" type = "text" id = "staff_username" name = "staff_username" placeholder = "Username.." value="<?php echo $row["staff_username"]; ?>" style = "width: 100%;">
      <i class="fas fa-check-circle"></i>               <!-- Changes -->
      <i class="fas fa-exclamation-circle"></i>          <!-- Changes -->
      <small>Error message</small>                        <!-- Changes All form-control class -->
      </div>

      <div class = "form-control" id = "firstnameform">
      <label for = "firstname">First Name</label>
      <input style = "width: 100%;" type = "text" id = "staff_firstname" name = "staff_firstname" placeholder = "First Name.." value="<?php echo $row["staff_firstname"] ?>" style = "width: 100%;">
      <i class="fas fa-check-circle"></i>
      <i class="fas fa-exclamation-circle"></i>
      <small>Error message</small>
      </div>

      <div class = "form-control" id = "lastnameform">
      <label for = "lastname">Last Name</label>
      <input style = "width: 100%;" type = "text" id = "staff_lastname" name = "staff_lastname" placeholder = "Last Name.." value="<?php echo $row["staff_lastname"] ?>" style = "width: 100%;">
      <i class="fas fa-check-circle"></i>
      <i class="fas fa-exclamation-circle"></i>
      <small>Error message</small>
      </div>

      <div class = "form-control" id = "passwordform">
      <label for = "password">Password</label><br>
      <input style = "width: 100%;" type = "password" id = "staff_password" name = "staff_password" placeholder = "Password.." value="<?php echo $row["staff_password"] ?>"><span toggle="#staff_password" class="fa fa-fw fa-eye field-icon toggle-password" style = "z-index: 10; position: relative; margin-left: -25px; margin-right: 5px;"></span>
      <i class="fas fa-check-circle"></i>
      <i class="fas fa-exclamation-circle"></i>
      <small>Error message</small>
      </div>

      <div class = "form-control" id = "confirmpasswordform">
      <label for = "password">Confirm Password</label><br>
      <input style = "width: 100%;" type = "password" id = "confirm_password" name = "confirm_password" placeholder = "Confirm Password.."  value="<?php echo $row["staff_password"] ?>"><span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password" style = "z-index: 10; position: relative; margin-left: -25px; margin-right: 5px;"></span>
      <i class="fas fa-check-circle"></i>
      <i class="fas fa-exclamation-circle"></i>
      <small>Error message</small>
      </div>



      <?php
        if($staff['type'] === 'admin'){
      ?>
      <div class="form-control"><!-- Changes -->
        <label for = "staff_type">Account Type</label>
        <select id = "staff_type" name = "staff_type" style = "width: 100%;">
        <option value = "staff">Staff</option>
        <option value = "admin" selected>Admin</option>
        </select>
      </div>
      <?php
        }
       ?>

      <button type = "button" class = "modalbtn" id = "edit-staff">Save changes</button>
      <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script type = "text/javascript">
  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
</script>
