<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>



<!--CHANGES MODAL - ADD -->
<div class = "modal" id = "tableModal">
  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "information" method = "POST">
    <div class = "container" style = "overflow-y: auto;">
    <h1 class = "modal-title"></h1>
    
    <input type="hidden" name="function" id = "function" value = "">
    <input type = "hidden" id = "id" name = "id" value = "">
    
    <label for = "acc_num">Accession Number</label>
    <input type = "text" id = "acc_num" name = "acc_num" placeholder = "Accession Number.." value="" readonly>

    <label for = "barcode">Barcode</label>
    <input type = "text" id = "barcode" name = "barcode" placeholder = "Barcode.." value="" readonly>

    <label for = "call_number">Call Number</label>
    <input type = "text" id = "call_number" name = "call_number" placeholder = "Call Number.." value="" readonly>

    <label for = "title">Material Title</label>
    <input type = "text" id = "title" name = "title" placeholder = "Title.." value="" readonly>

    <label for = "author">Material Author</label>
    <input type = "text" id = "author" name = "author" placeholder = "Author.." value="" readonly>

    <label for = "volume">Material Volume</label>
    <input type = "text" id = "volume" name = "volume" placeholder = "Volume.." value="" readonly>

    <label for = "year">Material Year</label>
    <input type = "text" id = "year" name = "year" placeholder = "Year.." value="" readonly>

    <label for = "edition">Material Edition</label>
    <input type = "text" id = "edition" name = "edition" placeholder = "Edition.." value="" readonly>

    <label for = "publisher">Publisher of the Material</label>
    <input type = "text" id = "publisher" name = "publisher" placeholder = "Publisher.." value="" readonly>

    <label for = "pub_year">Year of Publication</label>
    <input type = "text" id = "pub_year" name = "pub_year" placeholder = "Publication Year.." value="" readonly>

    <label for = "circ_type">Circulation Type</label>
    <input type = "text" id = "circ_type" name = "circ_type" value="" readonly>

    <label for = "type">Type</label>
    <input type = "text"  id = "type" name = "type" value="" readonly>

    <label for = "status">Status</label>
    <input type = "text"  id = "status" name = "status" value="" readonly>

    <label for = "source">Source</label>
    <input type = "text" id = "source" name = "source" placeholder = "Material Source.." value="" readonly>

    <label for = "last_year_inventoried">Last Year Inventoried</label>
    <input type = "text" id = "last_year_inventoried" name = "last_year_inventoried" value="" readonly>

    <div class = "clearfix"></div>
    </form>
    </div>
    </div>

<!--CHANGES MODAL - EDIT -->
    <div class = "modal fade" id = "tableModal2">
    <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
    <form class = "modal-content" id = "information2" method = "POST">
    <div class = "container" style = "overflow-y: auto;">
    <h1 class = "modal-title"></h1>

    
    <div class="row">
  <div class="column">

    <h4 style="text-align:center">CURRENT INFO</h4>
    <br>

    <input type="hidden" name="function" id = "function" value = "">
    <input type = "hidden" id = "id" name = "id" value = "">
    
    <label for = "acc_num">Accession Number</label>
    <input type = "text" id = "acc_num1" name = "acc_num" placeholder = "Accession Number.." value="" readonly>

    <label for = "barcode">Barcode</label>
    <input type = "text" id = "barcode1" name = "barcode" placeholder = "Barcode.." value="" readonly>

    <label for = "call_number">Call Number</label>
    <input type = "text" id = "call_number1" name = "call_number" placeholder = "Call Number.." value="" readonly>

    <label for = "title">Material Title</label>
    <input type = "text" id = "title1" name = "title" placeholder = "Title.." value="" readonly>

    <label for = "author">Material Author</label>
    <input type = "text" id = "author1" name = "author" placeholder = "Author.." value="" readonly>

    <label for = "volume">Material Volume</label>
    <input type = "text" id = "volume1" name = "volume" placeholder = "Volume.." value="" readonly>

    <label for = "year">Material Year</label>
    <input type = "text" id = "year1" name = "year" placeholder = "Year.." value="" readonly>

    <label for = "edition">Material Edition</label>
    <input type = "text" id = "edition1" name = "edition" placeholder = "Edition.." value="" readonly>

    <label for = "publisher">Publisher of the Material</label>
    <input type = "text" id = "publisher1" name = "publisher" placeholder = "Publisher.." value="" readonly>

    <label for = "pub_year">Year of Publication</label>
    <input type = "text" id = "pub_year1" name = "pub_year" placeholder = "Publication Year.." value="" readonly>

    <label for = "circ_type">Circulation Type</label>
    <input type = "text" id = "circ_type1" name = "circ_type" value="" readonly>

    <label for = "type">Type</label>
    <input type = "text"  id = "type1" name = "type" value="" readonly>

    <label for = "status">Status</label>
    <input type = "text"  id = "status1" name = "status" value="" readonly>

    <label for = "source">Source</label>
    <input type = "text" id = "source1" name = "source" placeholder = "Material Source.." value="" readonly>

    <label for = "last_year_inventoried">Last Year Inventoried</label>
    <input type = "text" id = "last_year_inventoried1" name = "last_year_inventoried" value="" readonly>
  </div>
  
  <div class="column">

    <h4 style="text-align:center">PREVIOUS INFO</h4>
    <br>
    
    <input type="hidden" name="function" id = "function" value = "">
    <input type = "hidden" id = "id" name = "id" value = "">
    
    <label for = "acc_num">Accession Number</label>
    <input type = "text" id = "acc_num2" name = "acc_num" placeholder = "Accession Number.." value="" readonly>

    <label for = "barcode">Barcode</label>
    <input type = "text" id = "barcode2" name = "barcode" placeholder = "Barcode.." value="" readonly>

    <label for = "call_number">Call Number</label>
    <input type = "text" id = "call_number2" name = "call_number" placeholder = "Call Number.." value="" readonly>

    <label for = "title">Material Title</label>
    <input type = "text" id = "title2" name = "title" placeholder = "Title.." value="" readonly>

    <label for = "author">Material Author</label>
    <input type = "text" id = "author2" name = "author" placeholder = "Author.." value="" readonly>

    <label for = "volume">Material Volume</label>
    <input type = "text" id = "volume2" name = "volume" placeholder = "Volume.." value="" readonly>

    <label for = "year">Material Year</label>
    <input type = "text" id = "year2" name = "year" placeholder = "Year.." value="" readonly>

    <label for = "edition">Material Edition</label>
    <input type = "text" id = "edition2" name = "edition" placeholder = "Edition.." value="" readonly>

    <label for = "publisher">Publisher of the Material</label>
    <input type = "text" id = "publisher2" name = "publisher" placeholder = "Publisher.." value="" readonly>

    <label for = "pub_year">Year of Publication</label>
    <input type = "text" id = "pub_year2" name = "pub_year" placeholder = "Publication Year.." value="" readonly>

    <label for = "circ_type">Circulation Type</label>
    <input type = "text" id = "circ_type2" name = "circ_type" value="" readonly>

    <label for = "type">Type</label>
    <input type = "text"  id = "type2" name = "type" value="" readonly>

    <label for = "status">Status</label>
    <input type = "text"  id = "status2" name = "status" value="" readonly>

    <label for = "source">Source</label>
    <input type = "text" id = "source2" name = "source" placeholder = "Material Source.." value="" readonly>

    <label for = "last_year_inventoried">Last Year Inventoried</label>
    <input type = "text" id = "last_year_inventoried2" name = "last_year_inventoried" value="" readonly>
  </div>
  </div>
  </div>
    

    <div class = "clearfix"></div>
    </form>
    </div>
    </div>