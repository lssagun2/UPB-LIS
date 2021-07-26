//Function responsible for editing Material.
function modifyMaterial(){
	console.log($('form#material').serialize());
	$('div#loading-cover').show();
	 //Process the inputs using a defined function for adding/editing material.
	$.ajax({
		type 		: 'POST',
		url			: 'functions/'+function_name+'.php',
		data 		: $('form#material').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		$("div#material-form-container").scrollTop(0);
		if(data.success){ 
			console.log(data);
			//Removal of any formhandler design after submitting success/fail form.
			$('div.form-control.error').removeClass('error');
			$('div.form-control.success').removeClass('success');
			addFilters();
			console.log("Success end");
		}
		else{
			//Prompting success/error inputs after submitting material form.
			if(data.errors.mat_acc_num){
				$("div#accnumform").addClass('error');
				$("div#accnumform small").html(data.errors.mat_acc_num);
			}
			else{
				$("div#accnumform").addClass('success');
			}
			
			if(data.errors.mat_call_num){
				$("div#callnumberform").addClass('error');
				$("div#callnumberform small").html(data.errors.mat_call_num);
			}
			else{
				$("div#callnumberform").addClass('success');
			}
			if(data.errors.mat_title){
				$("div#titleform").addClass('error');
				$("div#titleform small").html(data.errors.mat_title);
			}
			else{
				$("div#titleform").addClass('success');
			}
			if(data.errors.mat_author){
				$("div#authorform").addClass('error');
				$("div#authorform small").html(data.errors.mat_author);
			}
			else{
				$("div#authorform").addClass('success');
			}
			if(data.errors.mat_publisher){
				$("div#publisherform").addClass('error');
				$("div#publisherform small").html(data.errors.mat_publisher);
			}
			else{
				$("div#publisherform").addClass('success');
			}
			if(data.errors.mat_volume){
				$("div#volumeform").addClass('error');
				$("div#volumeform small").html(data.errors.mat_volume);
			}
			else{
				$("div#volumeform").addClass('success');
			}
			if(data.errors.mat_edition){
				$("div#editionform").addClass('error');
				$("div#editionform small").html(data.errors.mat_edition);
			}
			else{
				$("div#editionform").addClass('success');
			}
			if(data.errors.mat_pub_year){
				$("div#publisheryearform").addClass('error');
				$("div#publisheryearform small").html(data.errors.mat_pub_year);
			}
			else{
				$("div#publisheryearform").addClass('success');
			}
			if(data.errors.mat_source){
				$("div#sourceform").addClass('error');
				$("div#sourceform small").html(data.errors.mat_source);
			}
			else{
				$("div#sourceform").addClass('success');
			}
			if(data.errors.mat_price){
				$("div#priceform").addClass('error');
				$("div#priceform small").html(data.errors.mat_price);
			}
			else{
				$("div#priceform").addClass('success');
			}
			if(data.errors.mat_donor){
				$("div#donorform").addClass('error');
				$("div#donorform small").html(data.errors.mat_donor);
			}
			else{
				$("div#donorform").addClass('success');
			}
			if(data.errors.mat_barcode){
				$("div#barcodeform").addClass('error');
				$("div#barcodeform small").html(data.errors.mat_barcode);
			}
			else{
				$("div#barcodeform").addClass('success');
			}
			if(data.errors.mat_circ_type){
				$("div#circulationtypeform").addClass('error');
				$("div#circulationtypeform small").html(data.errors.mat_circ_type);
			}
			else{
				$("div#circulationtypeform").addClass('success');
			}
			if(data.errors.mat_type){
				$("div#typeform").addClass('error');
				$("div#typeform small").html(data.errors.mat_type);
			}
			else{
				$("div#typeform").addClass('success');
			}
			if(data.errors.mat_status){
				$("div#statusform").addClass('error');
				$("div#statusform small").html(data.errors.mat_status);
			}
			else{
				$("div#statusform").addClass('success');
			}
			if(data.errors.mat_status){
				$("div#statusform").addClass('error');
				$("div#statusform small").html(data.errors.mat_status);
			}
			else{
				$("div#statusform").addClass('success');
			}
			if(data.errors.mat_source){
				$("div#sourceform").addClass('error');
				$("div#sourceform small").html(data.errors.mat_source);
			}
			else{
				$("div#sourceform").addClass('success');
			}
			if(data.errors.mat_location){
				$("div#locationform").addClass('error');
				$("div#locationform small").html(data.errors.mat_location);
			}
			else{
				$("div#locationform").addClass('success');
			}
			if(data.errors.mat_supplier){
				$("div#supplierform").addClass('error');
				$("div#supplierform small").html(data.errors.mat_supplier);
			}
			else{
				$("div#supplierform").addClass('success');
			}
			if(data.errors.mat_acquisition_date){
				$("div#acquisitiondateform").addClass('error');
			}
			else{
				$("div#acquisitiondateform").addClass('success');
			}
			if(data.errors.mat_inv_num){
				$("div#invnumform").addClass('error');
				$("div#invnumform small").html(data.errors.mat_inv_num);
			}
			else{
				$("div#invnumform").addClass('success');
			}
			if(data.errors.mat_lastinv_year){
				$("div#lastyearinvform").addClass('error');
				$("div#lastyearinvform small").html(data.errors.mat_lastinv_year);
			}
			else{
				$("div#lastyearinvform").addClass('success');
			}
			if(data.errors.mat_remarks){
				$("div#remarksform").addClass('error');
				$("div#remarksform small").html(data.errors.mat_remarks);
			}
			else{
				$("div#remarksform").addClass('success');
			}
			console.log(data);
			$('div#loading-cover').hide();
		}
	return;
		
	})
	.fail(function(data) {
		console.log("Fail end");
      //Server failed to respond - Show an error message
      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}