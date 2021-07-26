$(document).ready(function(){
	$(document).on('click', 'button.accession-number', function(){
		material_column = "mat_acc_num";
		$("div#priceform").hide();
		$("div#donorform").hide();
		$("h2#inventory-type").html("Input Accession Number");
		$("button#inventory-submit").show();
		$('form#material-edit').trigger("reset");
		$('fieldset#material-fieldset').attr("disabled", "disabled");
		$('div.notif-bar').hide();
		$('div#inventory-modal').show();
		$("input#inventory-input").focus();
	});

	$(document).on('click', 'button.barcode-scanner', function(){
		material_column = "mat_barcode";
		$("div#priceform").hide();
		$("div#donorform").hide();
		$("h2#inventory-type").html("Scan Barcode");
		$("button#inventory-submit").hide();
		$('form#material-edit').trigger("reset");
		$('fieldset#material-fieldset').attr("disabled", "disabled");
		$('div.notif-bar').hide();
		$('div#inventory-modal').show();
		$("#inventory-input").focus();
	});

	$(document).on('click', 'button#inventory-submit', function(){
		$("form#inventory-record").submit();
	});

	$(document).on('click', 'button#rgbtn', function(){
		$('div#report').show();
	});

	$(document).on('click', 'button#submitbtn', function(){
		$('form#material-edit').submit();
	});

	$("form#inventory-record").submit(function(event){
		event.preventDefault();
		record();
	});

	$(document).on('change', 'select#report-select', function(){
		$('div.year-select').hide();
		if($(this).val() == 'inventory') {
			$('div#inventory-year').show();
		}
		if($(this).val() == 'comparison') {
			$('div#compare-year1').show();
			$('div#compare-year2').show();
		}
	});

	$(document).on('change', 'select#source', function(){
		$("div#priceform").hide();
		$("div#donorform").hide();
		$('select#currency').val("PHP");
		$('input#price').val("");
		$('input#donor').val("");
		if($("select#source").val() == "Purchased"){
			$("div#priceform").show();
		}
		if($("select#source").val() == "Donated"){
			$("div#donorform").show();
		}
	});
	$(document).on('click', 'button#reset-acquisition-date', function(){
		$("#acquisition_date").val("");
	});
});
