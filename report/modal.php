<div class = "modal" id = "filter">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "filter-form" method = "POST" style = "padding: 20px">
    <div class = "container" style = "overflow-y: auto;">
      <h1 class = "modal-title"></h1>
      <label for="circtype-filter">Circulation Type:</label>
      <select class = "filter-column circ-type-list" id="circtype-filter" name="circtype-filter" style = "width: 98%;">
        <option value = "" selected = "selected">---none---</option>
      </select>
      <label for="type-filter">Material Type:</label>
      <select class = "filter-column type-list" id="type-filter" name="type-filter" style = "width: 98%;">
        <option value = "" selected = "selected">---none---</option>
      </select>
      <label for="status-filter">Status:</label>
      <select class = "filter-column status-list" id="status-filter" name="status-filter" style = "width: 98%;">
        <option value = "" selected = "selected">---none---</option>
      </select>
      <label for="location-filter">Location:</label>
      <select class = "filter-column location-list" id="location-filter" name="location-filter" style = "width: 98%;">
        <option value = "" selected = "selected">---none---</option>
      </select>
      <button type = "button" class = "modalbtn" id = "update-filter" style = "margin-right: 0;">Update</button>
      <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>  
    </div>
  </form>
</div>