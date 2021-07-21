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

      <label for = "location">Location</label>
      <input type = "text" id = "location" name = "location" placeholder = "Location.." value="" readonly>

      <label for = "source">Source</label>
      <input type = "text" id = "source" name = "source" placeholder = "Material Source.." value="" readonly>

      <label for = "currency">Price</label>
      <div class="form-control" id = "priceform">
      <input type = "text" id="currency" name="currency" placeholder = "Currency.." value="" style="display: inline-block; width: 48%;" readonly>
      <input type = "text" id = "price" name = "price" placeholder = "Price.." value="" style="display: inline-block; width: 48%;" readonly>
      </div>

      <label for = "acquisition_month">Acquisition Date</label>
      <div class="form-control" id = "acquisitiondateform">
      <input type = "text" id = "acquisition_month" name = "acquisition_month"  placeholder = "Month.." value="" style="display: inline-block; width: 32%;" readonly>
      <input type = "text" id = "acquisition_day" name = "acquisition_day"  placeholder = "Day.." value="" style="display: inline-block; width: 32%;" readonly>
      <input type = "text" id = "acquisition_year" name = "acquisition_year" placeholder = "Year.." value="" style="display: inline-block; width: 32%;" readonly>
      </div>

      <label for = "supplier">Supplier</label>
      <input type = "text" id = "supplier" name = "supplier" placeholder = "Supplier.." value="" readonly>
          
      <label for = "inv_num">Inventory Item Number</label>
      <input type = "text" id = "inv_num" name = "inv_num" placeholder = "Inventory Item Number.." value="" readonly>

      <label for = "last_year_inventoried">Last Year Inventoried</label>
      <input type = "text" id = "last_year_inventoried" name = "last_year_inventoried" value="" readonly>
      
      <label for = "remarks">Remarks</label>
      <input type = "text" id = "remarks" name = "remarks" placeholder = "Remarks.." value="" readonly>
    </div>
  </form>
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

         <label for = "location">Location</label>
         <input type = "text" id = "location1" name = "location" placeholder = "Location.." value="" readonly>

          <label for = "source1">Source</label>
          <input type = "text" id = "source1" name = "source" placeholder = "Material Source.." value="" readonly>

          <label for = "donor1">Donor</label>
          <input type = "text" id = "donor1" name = "donor" placeholder = "Donor.." value="">

          <label for = "currency">Price</label>
          <div class="form-control" id = "priceform">
          <input type = "text" id="currency1" name="currency" placeholder = "Currency.." value="" style="display: inline-block; width: 48%;" readonly>
          <input type = "text" id = "price1" name = "price" placeholder = "Price.." value="" style="display: inline-block; width: 48%;" readonly>
          </div>

          <label for = "acquisition_month1">Acquisition Date</label>
          <div class="form-control" id = "acquisitiondateform">
          <input type = "text" id = "acquisition_month1" name = "acquisition_month"  placeholder = "Month.." value="" style="display: inline-block; width: 32%;" readonly>
          <input type = "text" id = "acquisition_day1" name = "acquisition_day"  placeholder = "Day.." value="" style="display: inline-block; width: 32%;" readonly>
          <input type = "text" id = "acquisition_year1" name = "acquisition_year" placeholder = "Year.." value="" style="display: inline-block; width: 32%;" readonly>
          </div>

          <label for = "supplier1">Supplier</label>
          <input type = "text" id = "supplier1" name = "supplier" placeholder = "Supplier.." value="" readonly>
          
          <label for = "inv_num">Inventory Item Number</label>
          <input type = "text" id = "inv_num1" name = "inv_num" placeholder = "Inventory Item Number.." value="" readonly>

          <label for = "last_year_inventoried">Last Year Inventoried</label>
          <input type = "text" id = "last_year_inventoried1" name = "last_year_inventoried" value="" readonly>
          
          <label for = "remarks1">Remarks</label>
          <input type = "text" id = "remarks1" name = "remarks" placeholder = "Remarks.." value="" readonly>
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

          <label for = "location">Location</label>
          <input type = "text" id = "location2" name = "location" placeholder = "Location.." value="" readonly>

          <label for = "source">Source</label>
          <input type = "text" id = "source2" name = "source" placeholder = "Material Source.." value="" readonly>

          <label for = "donor2">Donor</label>
         <input type = "text" id = "donor2" name = "donor" placeholder = "Donor.." value="">

          <label for = "currency2">Price</label>
          <div class="form-control" id = "priceform2">
          <input type = "text" id="currency2" name="currency" placeholder = "Currency.." value="" style="display: inline-block; width: 48%;" readonly>
          <input type = "text" id = "price2" name = "price" placeholder = "Price.." value="" style="display: inline-block; width: 48%;" readonly>
          </div>

          <label for = "acquisition_month2">Acquisition Date</label>
          <div class="form-control" id = "acquisitiondateform2">
          <input type = "text" id = "acquisition_month2" name = "acquisition_month"  placeholder = "Month.." value="" style="display: inline-block; width: 32%;" readonly>
          <input type = "text" id = "acquisition_day2" name = "acquisition_day"  placeholder = "Day.." value="" style="display: inline-block; width: 32%;" readonly>
          <input type = "text" id = "acquisition_year2" name = "acquisition_year" placeholder = "Year.." value="" style="display: inline-block; width: 32%;" readonly>
          </div>

          <label for = "supplier2">Supplier</label>
          <input type = "text" id = "supplier2" name = "supplier" placeholder = "Supplier.." value="" readonly>
          
          <label for = "inv_num">Inventory Item Number</label>
          <input type = "text" id = "inv_num2" name = "inv_num" placeholder = "Inventory Item Number.." value="" readonly>

          <label for = "last_year_inventoried">Last Year Inventoried</label>
          <input type = "text" id = "last_year_inventoried2" name = "last_year_inventoried" value="" readonly>

          <label for = "remarks2">Remarks</label>
          <input type = "text" id = "remarks2" name = "remarks" placeholder = "Remarks.." value="" readonly>
        </div>
      </div>
    </div>
  </form>
</div>