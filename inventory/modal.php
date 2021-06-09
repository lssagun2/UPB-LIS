<style>
@media screen and (max-width: 1366px) {
  #inventory-modal .modal-content {
    height: 500px;
  }
}
</style>

<div class = "modal" id = "inventory-modal">
  <div class = "notif-bar" style="color: white;"></div>
  <div class = "modal-dialog" role = "document">
    <div class = "modal-content">
      <div class = "modal-body">
        <div class = "column" id = "main">
          <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
          <h1>Material Information</h1>
          <form id = "material-edit" method = "POST">
            <div class = "container2">
              <input type = "hidden" id = "id" name = "id" value = "">
              <div class = "form-control" id = "accnumform"> <!-- Changes -->
                <label for = "acc_num">Accession Number</label>
                <input type = "text" id = "acc_num" name = "acc_num" placeholder = "Accession Number.." value="">
                <i class="fas fa-check-circle"></i>  <!-- Changes -->
                <i class="fas fa-exclamation-circle"></i> <!-- Changes -->
                <small>Error message</small> <!-- Changes -->
              </div> <!-- Changes -->

              <div class="form-control" id = "barcodeform"> <!-- Changes -->
                <label for = "barcode">Barcode</label>
                <input type = "text" id = "barcode" name = "barcode" placeholder = "Barcode.." value="">
                <i class="fas fa-check-circle"></i> <!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div>

              <div class="form-control" id = "callnumberform"> <!-- Changes -->
                <label for = "call_number">Call Number</label>
                <input type = "text" id = "call_number" name = "call_number" placeholder = "Call Number.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->


              <div class="form-control" id = "titleform"><!-- Changes -->
                <label for = "title">Title</label>
                <input type = "text" id = "title" name = "title" placeholder = "Title.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "authorform"><!-- Changes -->
                <label for = "author">Author</label>
                <input type = "text" id = "author" name = "author" placeholder = "Author.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "volumeform"><!-- Changes -->
                <label for = "volume">Volume</label>
                <input type = "text" id = "volume" name = "volume" placeholder = "Volume.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div>

              <div class="form-control" id = "yearform"><!-- Changes -->
                <label for = "year">Year</label>
                <input type = "text" id = "year" name = "year" placeholder = "Year.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div>

              <div class="form-control" id = "editionform"><!-- Changes -->
                <label for = "edition">Edition</label>
                <input type = "text" id = "edition" name = "edition" placeholder = "Edition.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div>

              <div class="form-control" id = "publisherform"><!-- Changes -->
                <label for = "publisher">Publisher</label>
                <input type = "text" id = "publisher" name = "publisher" placeholder = "Publisher.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "publisheryearform"><!-- Changes -->
                <label for = "pub_year">Year of Publication</label>
                <input type = "text" id = "pub_year" name = "pub_year" placeholder = "Publication Year.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "circulationtypeform"><!-- Changes -->
                <label for = "circ_type">Circulation Type</label>
                <input type = "text" id = "circ_type" name = "circ_type" list = "circ-type-list" placeholder="Circulation Type.." value="" autocomplete="off">
                <datalist class = "circ-type-list" id = "circ-type-list"></datalist>
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "typeform"> <!-- Changes -->
                <label for = "type">Type</label>
                <input type = "text" id = "type" name = "type" list = "type-list" placeholder="Type.." value="" autocomplete="off">
                <datalist class = "type-list" id = "type-list"></datalist>
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "statusform"><!-- Changes -->
                <label for = "status">Status</label>
                <input type = "text" id = "status" name = "status" list = "status-list" placeholder="Status.." value="" autocomplete="off">
                <datalist class = "status-list" id = "status-list"></datalist>
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "locationform"><!-- Changes -->
                <label for = "location">Location</label>
                <input type = "text" id = "location" name = "location" list = "location-list" placeholder="Location.." value="" autocomplete="off">
                <datalist class = "location-list" id = "location-list"></datalist>
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "sourceform"><!-- Changes -->
                <label for = "source">Source</label>
                <input type = "text" id = "source" name = "source" placeholder = "Material Source.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "invnumform"><!-- Changes -->
                <label for = "inv_num">Inventory Item Number</label>
                <input type = "text" id = "inv_num" name = "inv_num" placeholder = "Inventory Item Number.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->
    
              <div class="form-control" id = "lastyearinvform"><!-- Changes -->
                <label for = "last_year_inventoried">Last Year Inventoried</label>
                <input type = 'text' id = "last_year_inventoried" name = "last_year_inventoried" placeholder = "Last Year Inventoried.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <button type = "button" class = "modalbtn" id = "submitbtn" style = "width: auto;">Save Changes</button>
              <div class = "clearfix">
              </div>
            </div>
          </form>
        </div>
        <div class = "wave">
          <!--<?//xml version="1.0" encoding="UTF-8"?>-->
          <svg viewBox="0 0 67 578" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Page-1" stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                  <path d="M11.3847656,-5.68434189e-14 C-7.44726562,36.7213542 5.14322917,126.757812 49.15625,270.109375 C70.9827986,341.199016 54.8877465,443.829224 0.87109375,578 L67,578 L67,-5.68434189e-14 L11.3847656,-5.68434189e-14 Z" id="Path" fill="#ffcc3d"></path>
              </g>
          </svg>
        </div>
        <div class="column" id="secondary">
          <div class="sec-content">
            <h2 id = "inventory-type"></h2>
            <form id = "inventory-record">
              <div class="form-control" id = "inventory-input-div">
                <input type = "text" id = "inventory-input" name = "inventory-input" placeholder = "Input value..." value="" autocomplete="off">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <button type = "button" class = "modalbtn" id = "inventory-submit">Submit</button>
              <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class = "modal" id = "report">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "report-form" action = "../report/index.php" method = "POST" style = "height: auto; width: 40%;">
    <div class = "container" style = "overflow-y: auto;">
      <h1 class = "modal-title">Generate Report</h1>
      <label for="report-select">Choose report to generate:</label>
      <select class = "report-select" id="report-select" name="report-select" style = "width: 100%;">
        <option value = "materials">Materials</option>
        <option value = "inventory">Inventory</option>
        <option value = "comparison">Comparison</option>
      </select>
      <div class = "year-select" id = inventory-year style="display:none;">
        <label for="year">Choose a year:</label>
        <select id="year" name="year" style = "width: 100%;">
          <?php
            $sql = "SHOW COLUMNS FROM INVENTORY LIKE 'inv_%'";
            $result = $conn->query($sql);
          ?>
          <?php
            while($row = $result->fetch_assoc()){
          ?>
            <option value = "<?php echo substr($row["Field"], 4) ?>"><?php echo substr($row["Field"], 4) ?></option>
          <?php
            }
          ?>
        </select>
      </div>
      <div class = "year-select" id = compare-year1 style="display:none;">
        <label for="year1">Choose first year:</label>
        <select id="year1" name="year1" style = "width: 100%;">
          <?php
            $sql = "SHOW COLUMNS FROM INVENTORY LIKE 'inv_%'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
          ?>
            <option value = "<?php echo substr($row["Field"], 4) ?>"><?php echo substr($row["Field"], 4) ?></option>
          <?php
            }
          ?>
        </select>
      </div>
      <div class = "year-select" id = compare-year2 style="display:none;">
        <label for="year2">Choose second year:</label>
        <select id="year2" name="year2" style = "width: 100%;">
          <?php
            $sql = "SHOW COLUMNS FROM INVENTORY LIKE 'inv_%'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
          ?>
            <option value = "<?php echo substr($row["Field"], 4) ?>"><?php echo substr($row["Field"], 4) ?></option>
          <?php
            }
          ?>
        </select>
      </div>
      <button type = "submit" class = "modalbtn">Generate Report</button>
      <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
    </div> 
  </form>
</div>
