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
                <label for = "title">Material Title</label>
                <input type = "text" id = "title" name = "title" placeholder = "Title.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "authorform"><!-- Changes -->
                <label for = "author">Material Author</label>
                <input type = "text" id = "author" name = "author" placeholder = "Author.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "volumeform"><!-- Changes -->
                <label for = "volume">Material Volume</label>
                <input type = "text" id = "volume" name = "volume" placeholder = "Volume.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div>

              <div class="form-control" id = "yearform"><!-- Changes -->
                <label for = "year">Material Year</label>
                <input type = "text" id = "year" name = "year" placeholder = "Year.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div>

              <div class="form-control" id = "editionform"><!-- Changes -->
                <label for = "edition">Material Edition</label>
                <input type = "text" id = "edition" name = "edition" placeholder = "Edition.." value="">
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div>

              <div class="form-control" id = "publisherform"><!-- Changes -->
                <label for = "publisher">Publisher of the Material</label>
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
                <select id = "circ_type" name = "circ_type" value="">
                  <option value = "" selected>---none---</option>
                  <option value = "Circulation Book">Circulation Book</option>
                  <option value = "Circulation Monograph">Circulation Monograph</option>
                  <option value = "Cordillera Book">Cordillera Book</option>
                  <option value = "Cordillera Monograph">Cordillera Monograph</option>
                  <option value = "Cordillera Multimedia">Cordillera Multimedia</option>
                  <option value = "Filipiniana Reference">Filipiniana Reference</option>
                  <option value = "Filipiniana Archives">Filipiniana Archives</option>
                  <option value = "Filipiniana Book">Filipiniana Book</option>
                  <option value = "Filipiniana MO">Filipiniana MO</option>
                  <option value = "Filipiniana Monograph">Filipiniana Monograph</option>
                  <option value = "Filipiniana PIDS">Filipiniana PIDS</option>
                  <option value = "GRC Book">GRC Book</option>
                  <option value = "GRC MO">GRC MO</option>
                  <option value = "GRC Monograph">GRC Monograph</option>
                  <option value = "Howard Fry Special Collection - Room Use Only">Howard Fry Special Collection - Room Use Only</option>
                  <option value = "Multimedia Material">Multimedia Material</option>
                  <option value = "Non-Circulation">Non-Circulation</option>
                  <option value = "Periodicals - Room Use Only">Periodicals - Room Use Only</option>
                  <option value = "Reference - Room Use Only">Reference - Room Use Only</option>
                  <option value = "Reference - Room Use Only (Reserve Section)">Reference - Room Use Only (Reserve Section)</option>
                  <option value = "Reserve - Monograph">Reserve - Monograph</option>
                  <option value = "Reserve Book">Reserve Book</option>
                  <option value = "Reserve Book - 1 month loan">Reserve Book - 1 month loan</option>
                  <option value = "Reserve Book - Room Use Only">Reserve Book - Room Use Only</option>
                  <option value = "Room Use Only">Room Use Only</option>
                  <option value = "Thesis - Room Use Only">Thesis - Room Use Only</option>
                </select>
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "typeform"> <!-- Changes -->
                <label for = "type">Type</label>
                <select id = "type" name = "type" value="">
                  <option value = "" selected>---none---</option>
                  <option value = "Article">Article</option>
                  <option value = "Book">Book</option>
                  <option value = "Computer File">Computer File</option>
                  <option value = "Map">Map</option>
                  <option value = "Mixed Material">Mixed Material</option>
                  <option value = "Music">Music</option>
                  <option value = "Serial">Serial</option>
                  <option value = "Thesis">Thesis</option>
                  <option value = "Visual Material">Visual Material</option>
                </select>
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
                </div><!-- Changes -->

                <div class="form-control" id = "statusform"><!-- Changes -->
                <label for = "status">Status</label>
                <select id = "status" name = "status" value="">
                  <option value = "" selected>---none---</option>
                  <option value = "Available Online">Available Online</option>
                  <option value = "In Process">In Process</option>
                  <option value = "In Stacks Area">In Stacks Area</option>
                  <option value = "Long Overdue">Long Overdue</option>
                  <option value = "Lost">Lost</option>
                  <option value = "On Loan">On Loan</option>
                  <option value = "On Shelf">On Shelf</option>
                  <option value = "Preservation Copy">Preservation Copy</option>
                </select>
                <i class="fas fa-check-circle"></i><!-- Changes -->
                <i class="fas fa-exclamation-circle"></i><!-- Changes -->
                <small>Error message</small><!-- Changes -->
              </div><!-- Changes -->

              <div class="form-control" id = "locationform"><!-- Changes -->
                <label for = "location">Location</label>
                <select id = "location" name = "location" value="">
                  <option value = "" selected>---none---</option>
                  <option value = "Cordillera/Northern Luzon Archives">Cordillera/Northern Luzon Archives</option>
                  <option value = "Graduate Resource Center">Graduate Resource Center</option>
                  <option value = "Knowledge and Training Resource Center">Knowledge and Training Resource Center</option>
                  <option value = "Main Library">Main Library</option>
                </select>
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

              <div class="form-control" id = "lastyearinvform"><!-- Changes -->
                <label for = "last_year_inventoried">Last Year Inventoried</label>
                <select id = "last_year_inventoried" name = "last_year_inventoried" value="">
                  <option value = "0" selected>---none---</option>
                  <option value = "2021">2021</option>
                  <option value = "2020">2020</option>
                  <option value = "2019">2019</option>
                  <option value = "2018">2018</option>
                  <option value = "2017">2017</option>
                </select>
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
              <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
              <button type = "button" class = "modalbtn" id = "inventory-submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class = "modal" id = "report">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "report-form" action = "../report/index.php" method = "POST" style = "height: auto;">
    <div class = "container" style = "overflow-y: auto;">
    <h1 class = "modal-title">Generate Report</h1>
      <label for="report-select">Choose report to generate:</label>
      <select class = "report-select" id="report-select" name="report-select" style = "width: 100%;">
        <option value = "materials">Materials</option>
        <option value = "inventory">Inventory</option>
        <option value = "comparison">Comparison</option>
      </select>
      <div class="year-select" style="display: none">
        <label for="year1">Choose first year:</label>
        <select class = "year-select" id="year1" name="year1" style = "width: 100%;">
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
        <label for="year2">Choose second year:</label>
        <select class = "year-select" id="year2" name="year2" style = "width: 100%;">
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
      <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
      <button type = "submit" class = "modalbtn">Generate Report</button>
    </form>
  </div>
</div>
