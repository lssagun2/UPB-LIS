<div class = "modal" id = "material">
	<span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
	<form class = "modal-content" id = "material" method = "POST">
	<div class = "container" id = "material-form-container" style = "overflow-y: auto;">
		<h1 class = "modal-title"></h1>
		<input type="hidden" name="function" id = "function" value = "">
		<input type = "hidden" id = "id" name = "id" value = "">
		<h3 id = "delete-material" style="padding-bottom: 20px;">Are you sure you want to delete this material?</h3>
		<fieldset id = "material-fieldset" style = "padding: 0; border: none;">
			<div class = "form-control" id = "accnumform"> 
			<label for = "acc_num">Accession Number</label>
			<input type = "text" id = "acc_num" name = "acc_num" placeholder = "Accession Number.." value="">
			<i class="fas fa-check-circle"></i>  
			<i class="fas fa-exclamation-circle"></i> 
			<small>Error message</small> 
			</div> 

			<div class="form-control" id = "callnumberform"> 
			<label for = "call_number">Call Number</label>
			<input type = "text" id = "call_number" name = "call_number" placeholder = "Call Number.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "titleform">
			<label for = "title">Title</label>
			<input type = "text" id = "title" name = "title" placeholder = "Title.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "authorform">
			<label for = "author">Author</label>
			<input type = "text" id = "author" name = "author" placeholder = "Author.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "publisherform">
			<label for = "publisher">Publisher</label>
			<input type = "text" id = "publisher" name = "publisher" placeholder = "Publisher.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "volumeform">
			<label for = "volume">Volume</label>
			<input type = "text" id = "volume" name = "volume" placeholder = "Volume.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "editionform">
			<label for = "edition">Edition</label>
			<input type = "text" id = "edition" name = "edition" placeholder = "Edition.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>


			<div class="form-control" id = "publisheryearform">
			<label for = "pub_year">Year of Publication</label>
			<input type = "text" id = "pub_year" name = "pub_year" placeholder = "Publication Year.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "sourceform">
			<label for = "source">Source</label>
			<select id = "source" name = "source" placeholder = "Source.." value="">
				<option value = "">Source..</option>
				<option value = "Purchased">Purchased</option>
				<option value = "Donated">Donated</option>
			</select>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>
		
			<div class="form-control" id = "priceform">
			<label style="display: block;">Price</label>
			<select id="currency" name="currency" style="display: inline-block; width: 50%;">
					<option value="AFA">Afghan Afghani</option>
					<option value="ALL">Albanian Lek</option>
					<option value="DZD">Algerian Dinar</option>
					<option value="AOA">Angolan Kwanza</option>
					<option value="ARS">Argentine Peso</option>               
					<option value="AMD">Armenian Dram</option>
					<option value="AWG">Aruban Florin</option>
					<option value="AUD">Australian Dollar</option>
					<option value="AZN">Azerbaijani Manat</option>
					<option value="BSD">Bahamian Dollar</option>
					<option value="BHD">Bahraini Dinar</option>
					<option value="BDT">Bangladeshi Taka</option>
					<option value="BBD">Barbadian Dollar</option>
					<option value="BYR">Belarusian Ruble</option>
					<option value="BEF">Belgian Franc</option>
					<option value="BZD">Belize Dollar</option>
					<option value="BMD">Bermudan Dollar</option>
					<option value="BTN">Bhutanese Ngultrum</option>
					<option value="BTC">Bitcoin</option>
					<option value="BOB">Bolivian Boliviano</option>
					<option value="BAM">Bosnia-Herzegovina Convertible Mark</option>
					<option value="BWP">Botswanan Pula</option>
					<option value="BRL">Brazilian Real</option>
					<option value="GBP">British Pound Sterling</option>
					<option value="BND">Brunei Dollar</option>
					<option value="BGN">Bulgarian Lev</option>
					<option value="BIF">Burundian Franc</option>
					<option value="KHR">Cambodian Riel</option>
					<option value="CAD">Canadian Dollar</option>
					<option value="CVE">Cape Verdean Escudo</option>
					<option value="KYD">Cayman Islands Dollar</option>
					<option value="XOF">CFA Franc BCEAO</option>
					<option value="XAF">CFA Franc BEAC</option>
					<option value="XPF">CFP Franc</option>
					<option value="CLP">Chilean Peso</option>
					<option value="CNY">Chinese Yuan</option>
					<option value="COP">Colombian Peso</option>
					<option value="KMF">Comorian Franc</option>
					<option value="CDF">Congolese Franc</option>
					<option value="CRC">Costa Rican ColÃ³n</option>
					<option value="HRK">Croatian Kuna</option>
					<option value="CUC">Cuban Convertible Peso</option>
					<option value="CZK">Czech Republic Koruna</option>
					<option value="DKK">Danish Krone</option>
					<option value="DJF">Djiboutian Franc</option>
					<option value="DOP">Dominican Peso</option>
					<option value="XCD">East Caribbean Dollar</option>
					<option value="EGP">Egyptian Pound</option>
					<option value="ERN">Eritrean Nakfa</option>
					<option value="EEK">Estonian Kroon</option>
					<option value="ETB">Ethiopian Birr</option>
					<option value="EUR">Euro</option>
					<option value="FKP">Falkland Islands Pound</option>
					<option value="FJD">Fijian Dollar</option>
					<option value="GMD">Gambian Dalasi</option>
					<option value="GEL">Georgian Lari</option>
					<option value="DEM">German Mark</option>
					<option value="GHS">Ghanaian Cedi</option>
					<option value="GIP">Gibraltar Pound</option>
					<option value="GRD">Greek Drachma</option>
					<option value="GTQ">Guatemalan Quetzal</option>
					<option value="GNF">Guinean Franc</option>
					<option value="GYD">Guyanaese Dollar</option>
					<option value="HTG">Haitian Gourde</option>
					<option value="HNL">Honduran Lempira</option>
					<option value="HKD">Hong Kong Dollar</option>
					<option value="HUF">Hungarian Forint</option>
					<option value="ISK">Icelandic KrÃ³na</option>
					<option value="INR">Indian Rupee</option>
					<option value="IDR">Indonesian Rupiah</option>
					<option value="IRR">Iranian Rial</option>
					<option value="IQD">Iraqi Dinar</option>
					<option value="ILS">Israeli New Sheqel</option>
					<option value="ITL">Italian Lira</option>
					<option value="JMD">Jamaican Dollar</option>
					<option value="JPY">Japanese Yen</option>
					<option value="JOD">Jordanian Dinar</option>
					<option value="KZT">Kazakhstani Tenge</option>
					<option value="KES">Kenyan Shilling</option>
					<option value="KWD">Kuwaiti Dinar</option>
					<option value="KGS">Kyrgystani Som</option>
					<option value="LAK">Laotian Kip</option>
					<option value="LVL">Latvian Lats</option>
					<option value="LBP">Lebanese Pound</option>
					<option value="LSL">Lesotho Loti</option>
					<option value="LRD">Liberian Dollar</option>
					<option value="LYD">Libyan Dinar</option>
					<option value="LTL">Lithuanian Litas</option>
					<option value="MOP">Macanese Pataca</option>
					<option value="MKD">Macedonian Denar</option>
					<option value="MGA">Malagasy Ariary</option>
					<option value="MWK">Malawian Kwacha</option>
					<option value="MYR">Malaysian Ringgit</option>
					<option value="MVR">Maldivian Rufiyaa</option>
					<option value="MRO">Mauritanian Ouguiya</option>
					<option value="MUR">Mauritian Rupee</option>
					<option value="MXN">Mexican Peso</option>
					<option value="MDL">Moldovan Leu</option>
					<option value="MNT">Mongolian Tugrik</option>
					<option value="MAD">Moroccan Dirham</option>
					<option value="MZM">Mozambican Metical</option>
					<option value="MMK">Myanmar Kyat</option>
					<option value="NAD">Namibian Dollar</option>
					<option value="NPR">Nepalese Rupee</option>
					<option value="ANG">Netherlands Antillean Guilder</option>
					<option value="TWD">New Taiwan Dollar</option>
					<option value="NZD">New Zealand Dollar</option>
					<option value="NIO">Nicaraguan CÃ³rdoba</option>
					<option value="NGN">Nigerian Naira</option>
					<option value="KPW">North Korean Won</option>
					<option value="NOK">Norwegian Krone</option>
					<option value="OMR">Omani Rial</option>
					<option value="PKR">Pakistani Rupee</option>
					<option value="PAB">Panamanian Balboa</option>
					<option value="PGK">Papua New Guinean Kina</option>
					<option value="PYG">Paraguayan Guarani</option>
					<option value="PEN">Peruvian Nuevo Sol</option>
					<option value="PHP" selected="selected">Philippine Peso</option>
					<option value="PLN">Polish Zloty</option>
					<option value="QAR">Qatari Rial</option>
					<option value="RON">Romanian Leu</option>
					<option value="RUB">Russian Ruble</option>
					<option value="RWF">Rwandan Franc</option>
					<option value="SVC">Salvadoran ColÃ³n</option>
					<option value="WST">Samoan Tala</option>
					<option value="SAR">Saudi Riyal</option>
					<option value="RSD">Serbian Dinar</option>
					<option value="SCR">Seychellois Rupee</option>
					<option value="SLL">Sierra Leonean Leone</option>
					<option value="SGD">Singapore Dollar</option>
					<option value="SKK">Slovak Koruna</option>
					<option value="SBD">Solomon Islands Dollar</option>
					<option value="SOS">Somali Shilling</option>
					<option value="ZAR">South African Rand</option>
					<option value="KRW">South Korean Won</option>
					<option value="XDR">Special Drawing Rights</option>
					<option value="LKR">Sri Lankan Rupee</option>
					<option value="SHP">St. Helena Pound</option>
					<option value="SDG">Sudanese Pound</option>
					<option value="SRD">Surinamese Dollar</option>
					<option value="SZL">Swazi Lilangeni</option>
					<option value="SEK">Swedish Krona</option>
					<option value="CHF">Swiss Franc</option>
					<option value="SYP">Syrian Pound</option>
					<option value="STD">São Tomé and Príncipe Dobra</option>
					<option value="TJS">Tajikistani Somoni</option>
					<option value="TZS">Tanzanian Shilling</option>
					<option value="THB">Thai Baht</option>
					<option value="TOP">Tongan pa'anga</option>
					<option value="TTD">Trinidad & Tobago Dollar</option>
					<option value="TND">Tunisian Dinar</option>
					<option value="TRY">Turkish Lira</option>
					<option value="TMT">Turkmenistani Manat</option>
					<option value="UGX">Ugandan Shilling</option>
					<option value="UAH">Ukrainian Hryvnia</option>
					<option value="AED">United Arab Emirates Dirham</option>
					<option value="UYU">Uruguayan Peso</option>
					<option value="USD">US Dollar</option>
					<option value="UZS">Uzbekistan Som</option>
					<option value="VUV">Vanuatu Vatu</option>
					<option value="VEF">Venezuelan BolÃ­var</option>
					<option value="VND">Vietnamese Dong</option>
					<option value="YER">Yemeni Rial</option>
					<option value="ZMK">Zambian Kwacha</option>
			</select>
			<input type = "text" id = "price" name = "price" placeholder = "Price.." value="" style="display: inline-block; width: 49.5%; height:50px;">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "donorform">
			<label for = "donor">Donor</label>
			<input type = "text" id = "donor" name = "donor" placeholder = "Donor.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "barcodeform"> 
			<label for = "barcode">Barcode</label>
			<input type = "text" id = "barcode" name = "barcode" placeholder = "Barcode.." value="">
			<i class="fas fa-check-circle"></i> 
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "circulationtypeform">
			<label for = "circ_type">Circulation Type</label>
			<input type = "text" id = "circ_type" name = "circ_type" list = "circ-type-list" placeholder="Circulation Type.." value="" autocomplete="off">
			<datalist class = "circ-type-list" id = "circ-type-list"></datalist>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "typeform"> 
			<label for = "type">Material Type</label>
			<input type = "text" id = "type" name = "type" list = "type-list" placeholder="Type.." value="" autocomplete="off">
			<datalist class = "type-list" id = "type-list"></datalist>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "statusform">
			<label for = "status">Status</label>
			<input type = "text" id = "status" name = "status" list = "status-list" placeholder="Status.." value="" autocomplete="off">
			<datalist class = "status-list" id = "status-list"></datalist>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "locationform">
			<label for = "location">Location</label>
			<input type = "text" id = "location" name = "location" list = "location-list" placeholder="Location.." value="" autocomplete="off">
			<datalist class = "location-list" id = "location-list"></datalist>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "acquisitiondateform">
			<label style="display: block;">Acquisition Date</label>
			<select id = "acquisition_month" name = "acquisition_month" style="display: inline-block; width: 33%;">
				<option value="00">Select a month</option>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<select id = "acquisition_day" name = "acquisition_day" style="display: inline-block; width: 33%;">
				<option value="00">Select a day</option>
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
			<input type = "text" id = "acquisition_year" name = "acquisition_year" placeholder = "Year.." value="" style="display: inline-block; width: 33%; height:50px">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Please check the date</small>
			</div>

			<div class="form-control" id = "supplierform">
			<label for = "supplier">Supplier</label>
			<input type = "text" id = "supplier" name = "supplier" placeholder = "Supplier.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "invnumform">
			<label for = "inv_num">Inventory Item Number</label>
			<input type = "text" id = "inv_num" name = "inv_num" placeholder = "Inventory Item Number.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "lastyearinvform">
			<label for = "last_year_inventoried">Last Year Inventoried</label>
			<input type = "text" id = "last_year_inventoried" name = "last_year_inventoried" placeholder = "Last Year Inventoried.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>

			<div class="form-control" id = "remarksform">
			<label for = "remarks">Remarks</label>
			<input type = "text" id = "remarks" name = "remarks" placeholder = "Remarks.." value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			</div>
		</fieldset>
		<button type = "button" class = "modalbtn" id = "submitbtn"></button>
		<button type = "button" class = "modalbtn" id = "cancelbtn">Cancel</button>
	</div>
	</form>
</div>
<div class = "modal" id = "success-notification">
	<span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
	<div class = "modal-content" id = "success-notification">
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
