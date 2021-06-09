<div class = "modal" id = "material">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "material" method = "POST">
    <div class = "container" id = "material-form-container" style = "overflow-y: auto;">
    <h1 class = "modal-title"></h1>
    <input type="hidden" name="function" id = "function" value = "">
    <input type = "hidden" id = "id" name = "id" value = "">


    <div class = "form-control" id = "accnumform"> <!-- Changes -->
    <label for = "acc_num">Accession Number</label>
    <input type = "text" id = "acc_num" name = "acc_num" placeholder = "Accession Number.." value="" onclick="alertAccNum()">
    <i class="fas fa-check-circle"></i>  <!-- Changes -->
    <i class="fas fa-exclamation-circle"></i> <!-- Changes -->
    <small>Error message</small> <!-- Changes -->
    </div> <!-- Changes -->

    <div class="form-control" id = "barcodeform"> <!-- Changes -->
    <label for = "barcode">Barcode</label>
    <input type = "text" id = "barcode" name = "barcode" placeholder = "Barcode.." value="" onclick="alertBarcode()">
    <i class="fas fa-check-circle"></i> <!-- Changes -->
    <i class="fas fa-exclamation-circle"></i><!-- Changes -->
    <small>Error message</small><!-- Changes -->
    </div>

    <div class="form-control" id = "callnumberform"> <!-- Changes -->
    <label for = "call_number">Call Number</label>
    <input type = "text" id = "call_number" name = "call_number" placeholder = "Call Number.." value="" onclick="alertCallNum()">
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
    <input type = "text" id = "source" name = "source" placeholder = "Source.." value="">
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
    <input type = "text" id = "last_year_inventoried" name = "last_year_inventoried" placeholder = "Last Year Inventoried.." value="">
    <i class="fas fa-check-circle"></i><!-- Changes -->
    <i class="fas fa-exclamation-circle"></i><!-- Changes -->
    <small>Error message</small><!-- Changes -->
    </div><!-- Changes -->

    <button type = "button" class = "modalbtn" id = "submitbtn"></button>
    <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
  </div>
  </form>
</div>
<div class = "modal" id = "success-notification">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <div class = "modal-content" id = "" style = "padding: 20px; width: 25%; margin-top: 250px;">
    <form class = "container" style = "overflow-y: auto;">
      <h3 id = "success-text"></h3><br>
      <button type = "button" class = "modalbtn" id = "success-button" style = "margin-right: 0;">Add Another Material</button>
      <button type = "button" class = "modalbtn" id = "cancelbtn">Close</button>  
    </div>
  </form>
</div>
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


<script type="text/javascript">
  function alertAccNum(){
    if(document.getElementById("acc_num").value == ""){
      alert("NOTE: It is highly recommended to insert a unique accession number.");
    }
  }
  function alertBarcode(){
    if(document.getElementById("barcode").value == ""){
      alert("NOTE: It is highly recommended to insert a unique barcode.");
    }
  }
  function alertCallNum(){
    if(document.getElementById("call_number").value == ""){
      alert("NOTE: It is highly recommended to insert a unique Call Number.");
    }
  }
</script>
