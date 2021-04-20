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