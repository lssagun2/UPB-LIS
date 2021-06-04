<div class = "modal" id = "deleteStaff">
  <?php
    // $sql = "SELECT * FROM STAFF WHERE staff_id = '$primaryKey'";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
  ?>
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "deleteStaffForm" method = "POST">
    <div class = "containerDelete" style = "overflow-y: auto;">
      <h1 class = "modal-title"></h1>
      <div>
        <strong>Are you sure you want to delete this data?</strong> <br><br>
      </div>

      <input type="hidden" readonly="readonly" name="primaryKey" id = "primaryKey" val = "">

      <label for="firstnamedel">Username</label>
      <input type = "text" readonly="readonly" name="firstnamedel" id = "firstnamedel" val = "">
      <label for="lastnamedel">Last Name</label>
      <input type = "text" readonly="readonly" name="lastnamedel" id = "lastnamedel" val = "">
      <label for="passworddel">Password</label>
      <input type = "text" readonly="readonly" name="passworddel" id = "passworddel" val = "">
      <button type = "button" class = "modalbtn" id = "delete-staff">Delete Data</button>
      <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtn">Cancel</button>
    </div>
  </form>
</div>
