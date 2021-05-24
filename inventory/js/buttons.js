$(document).ready(function(){
	$(document).on('click', 'button.accession-number', function(){
		material_column = "mat_acc_num";
		$("h2#inventory-type").html("Input Accession Number");
		$("button#inventory-submit").show();
		$('form#material-edit').trigger("reset");
		$('div.notif-bar').hide();
		$('div#inventory-modal').show();
		$("input#inventory-input").focus();
	});
	$(document).on('click', 'button.barcode-scanner', function(){
		material_column = "mat_barcode";
		$("h2#inventory-type").html("Scan Barcode");
		$("button#inventory-submit").hide();
		$('form#material-edit').trigger("reset");
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
		console.log($(this).val());
		if($(this).val() == 'comparison') {
		$('div.year-select').show();
		}
		else{
		$('div.year-select').hide();
		}
	});
});
