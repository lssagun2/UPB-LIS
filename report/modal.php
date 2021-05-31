<div class = "modal" id = "filter">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "filter-form" method = "POST" style = "padding: 20px">
    <div class = "container" style = "overflow-y: auto;">
    <h1 class = "modal-title"></h1>
      <label for="circtype-filter">Circulation Type:</label>
      <select class = "filter-column" id="circtype-filter" name="circtype-filter" style = "width: 98%;">
        <option value = "" selected = "selected">---none---</option>
        <?php
          $sql = "SELECT DISTINCT mat_circ_type FROM MATERIAL";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
        ?>
        <option value = "<?php echo $row['mat_circ_type']?>"><?php echo $row['mat_circ_type']?></option>
        <?php } ?>
      </select>
      <label for="type-filter">Material Type:</label>
      <select class = "filter-column" id="type-filter" name="type-filter" style = "width: 98%;">
        <option value = "" selected = "selected">---none---</option>
        <?php
          $sql = "SELECT DISTINCT mat_type FROM MATERIAL";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
        ?>
        <option value = "<?php echo $row['mat_type']?>"><?php echo $row['mat_type']?></option>
        <?php } ?>
      </select>
      <label for="status-filter">Status:</label>
      <select class = "filter-column" id="status-filter" name="status-filter" style = "width: 98%;">
        <option value = "" selected = "selected">---none---</option>
        <?php
          $sql = "SELECT DISTINCT mat_status FROM MATERIAL";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
        ?>
        <option value = "<?php echo $row['mat_status']?>"><?php echo $row['mat_status']?></option>
        <?php } ?>
      </select>
      <label for="location-filter">Location:</label>
      <select class = "filter-column" id="location-filter" name="location-filter" style = "width: 98%;">
        <option value = "" selected = "selected">---none---</option>
       <?php
          $sql = "SELECT DISTINCT mat_location FROM MATERIAL";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
        ?>
        <option value = "<?php echo $row['mat_location']?>"><?php echo $row['mat_location']?></option>
        <?php } ?>
      </select>
      <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
      <button type = "button" class = "modalbtn" id = "update-filter">Update</button>
    </form>
  </div>
</div>
