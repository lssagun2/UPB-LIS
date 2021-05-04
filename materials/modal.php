<div class = "modal" id = "material">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "material" method = "POST">
    <div class = "container" style = "overflow-y: auto; height: 480px;">
    <h1 class = "modal-title"></h1>
    <input type="hidden" name="function" id = "function" value = "">
    <input type = "hidden" id = "id" name = "id" value = "">
    <label for = "acc_num">Accession Number</label>
    <input type = "text" id = "acc_num" name = "acc_num" placeholder = "Accession Number.." value="">

    <label for = "barcode">Barcode</label>
    <input type = "text" id = "barcode" name = "barcode" placeholder = "Barcode.." value="">

    <label for = "call_number">Call Number</label>
    <input type = "text" id = "call_number" name = "call_number" placeholder = "Call Number.." value="">

    <label for = "title">Material Title</label>
    <input type = "text" id = "title" name = "title" placeholder = "Title.." value="">

    <label for = "author">Material Author</label>
    <input type = "text" id = "author" name = "author" placeholder = "Author.." value="">

    <label for = "volume">Material Volume</label>
    <input type = "text" id = "volume" name = "volume" placeholder = "Volume.." value="">

    <label for = "year">Material Year</label>
    <input type = "text" id = "year" name = "year" placeholder = "Year.." value="">

    <label for = "edition">Material Edition</label>
    <input type = "text" id = "edition" name = "edition" placeholder = "Edition.." value="">

    <label for = "publisher">Publisher of the Material</label>
    <input type = "text" id = "publisher" name = "publisher" placeholder = "Publisher.." value="">

    <label for = "pub_year">Year of Publication</label>
    <input type = "text" id = "pub_year" name = "pub_year" placeholder = "Publication Year.." value="">

    <label for = "circ_type">Circulation Type</label>
    <select id = "circ_type" name = "circ_type" value="">
      <option value = "none">---none---</option>
      <option value = "Circulation">Circulation</option>
      <option value = "Cordillera">Cordillera</option>
      <option value = "Filipiniana">Filipiniana</option>
      <option value = "HFSC-RUO">Howard Fry Special Collection-Room Use Only</option>
      <option value = "Periodicals">Periodicals</option>
      <option value = "Reserve">Reserve</option>
      <option value = "Thesis">Thesis</option>
    </select>

    <label for = "type">Type</label>
    <select id = "type" name = "type" value="">
      <option value = "none">---none---</option>
      <option value = "Book">Book</option>
      <option value = "Reference">Reference</option>
      <option value = "Journal">Journal</option>
      <option value = "Article">Article</option>
      <option value = "Thesis">Thesis</option>
      <option value = "Reserve">Reserve</option>
      <option value = "Thesis">Thesis</option>
    </select>

    <label for = "status">Status</label>
    <select id = "status" name = "status" value="">
      <option value = "none">---none---</option>
      <option value = "On Shelf">On Shelf</option>
      <option value = "On Loan">On Loan</option>
      <option value = "In Process">In Process</option>
      <option value = "Lost">Lost</option>
      <option value = "Long Overdue">Long Overdue</option>
      <option value = "Deleted">Deleted</option>
      <option value = "Preservation Copy">Preservation Copy</option>
    </select>

    <label for = "source">Source</label>
    <input type = "text" id = "source" name = "source" placeholder = "Material Source.." value="">

    <label for = "last_year_inventoried">Last Year Inventoried</label>
    <select id = "last_year_inventoried" name = "last_year_inventoried" value="">
      <option value = "0" selected>---none---</option>
      <option value = "2021">2021</option>
      <option value = "2020">2020</option>
      <option value = "2019">2019</option>
      <option value = "2018">2018</option>
      <option value = "2017">2017</option>
    </select>
    <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
    <button type = "button" class = "modalbtn" id = "submitbtn"></button>
    <div class = "clearfix">

    </div>
  </div>
  </form>
</div>
<div class = "modal" id = "filter">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "filter-form" method = "POST">
    <div class = "container" style = "overflow-y: auto; height: 480px;">
    <h1 class = "modal-title"></h1>
      <label for="circtype-filter">Circulation Type:</label>
      <select id="circtype-filter" name="circtype-filter">
        <option value = "" selected>none</option>
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
      <label for="type-filter">Material Type:</label>
      <select id="type-filter" name="type-filter">
        <option value = "" selected>none</option>
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
      <label for="status-filter">Status:</label>
      <select id="status-filter" name="status-filter">
        <option value = "" selected>none</option>
        <option value = "Available Online">Available Online</option>
        <option value = "In Process">In Process</option>
        <option value = "In Stacks Area">In Stacks Area</option>
        <option value = "Long Overdue">Long Overdue</option>
        <option value = "Lost">Lost</option>
        <option value = "On Loan">On Loan</option>
        <option value = "On Shelf">On Shelf</option>
        <option value = "Preservation Copy">Preservation Copy</option>
      </select>
      <label for="location-filter">Location:</label>
      <select id="location-filter" name="location-filter">
        <option value = "" selected>none</option>
        <option value = "Cordillera/Northern Luzon Archives">Cordillera/Northern Luzon Archives</option>
        <option value = "Graduate Resource Center">Graduate Resource Center</option>
        <option value = "Knowledge and Training Resource Center">Knowledge and Training Resource Center</option>
        <option value = "Main Library">Main Library</option>
      </select>
      <button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
      <button type = "button" class = "modalbtn" id = "update-filter">Update</button>
    </form>
  </div>
</div>