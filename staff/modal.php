<style>
.container {
  overflow-y: auto;
  height: 480px;
}

@media screen and (max-width: 1366px) {
  .container {
    height: 400px;
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
      <input style = "width: 100%;" type = "password" id = "confirm_password" name = "confirm_password" placeholder = "Confirm Password.." value="<?php echo $row["staff_password"] ?>"><span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password" style = "z-index: 10; position: relative; margin-left: -25px; margin-right: 5px;"></span>
      <i class="fas fa-check-circle"></i>
      <i class="fas fa-exclamation-circle"></i>
      <small>Error message</small>
      </div>

      <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtn">Cancel</button>
      <button type = "button" class = "modalbtn" id = "edit-staff">Save changes</button>
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
