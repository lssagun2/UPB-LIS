<div class = "modal" id = "backup-modal">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "backup-form" method = "POST" style = "padding: 20px; width: 40%;">
    <div class = "container" style = "overflow-y: auto;">
      <h1 class = "modal-title">Data Backup</h1>
      <label for="backup-type">Choose a backup type:</label>
      <select id="backup-type" name="backup-type" style = "width: 100%;">
        <option value = "server">Create backup in the server</option>
        <option value = "client">Create backup in this computer</option>
      </select>
      <button type = "button" class = "modalbtn" id = "create-backup" style = "margin-right: 0;">Create Backup</button>
      <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>  
    </div>
  </form>
</div>
<div class = "modal" id = "backup-success">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "backup-form" method = "POST" style = "padding: 20px; width: 30%; margin-top: 250px;">
    <div class = "container" style = "overflow-y: auto;">
      <h3>The backup was successfully created!</h3>
      <button type = "button" class = "modalbtn" id = "cancelbtn" style = "margin-right: 0;">Close</button>
    </div>
  </form>
</div>