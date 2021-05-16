<div class = "modal" id = "deleteStaff">
  <?php 
    // $sql = "SELECT * FROM STAFF WHERE staff_id = '$primaryKey'";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
  ?>
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "staff" method = "POST">
    <div class = "containerDelete" style = "overflow-y: auto; height: 480px;">
      <h1 class = "modal-title">Update My Information</h1>
     
      

      

      <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtn">Cancel</button>
      <button type = "button" class = "modalbtn" id = "edit-staff">Save changes</button>
    </div>
  </form>
</div>
