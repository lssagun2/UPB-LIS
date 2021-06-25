<!--Modal that shows confirmation message when deleting a staff account-->
<div class = "modal" id = "change-active-div">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "change-active-form" method = "POST">
    <div class = "containerDelete" style = "overflow-y: auto;">
      <h1 class = "modal-title"></h1>
      <div>
        <strong>Are you sure you want to <span id = 'change-active'></span> this staff?</strong> <br><br>
      </div>
      <input type="hidden" readonly="readonly" name="change-active-function" id = "change-active-function" val = "">
      <input type="hidden" readonly="readonly" name="primaryKey" id = "primaryKey" val = "">
      <label for="username">Username</label>
      <input type = "text" readonly="readonly" name="username" id = "username" val = "">
      <label for="firstname">First Name</label>
      <input type = "text" readonly="readonly" name="firstname" id = "firstname" val = "">
      <label for="lastname">Last Name</label>
      <input type = "text" readonly="readonly" name="lastname" id = "lastname" val = "">
      <button type = "button" class = "modalbtn" data-function = "" id = "change-active-confirm"></button>
      <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtn">Cancel</button>
    </div>
  </form>
</div>
