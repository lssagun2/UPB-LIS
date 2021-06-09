$(document).ready(function(){
	$("form#material-edit").submit(function(event){
		$('div.form-control.error').removeClass('error');// Change
		$('div.form-control.success').removeClass('success');// Change
		event.preventDefault();
		var function_name = $("#function").val();
		$('div#loading-cover').show();
		$.ajax({
			type 		: 'POST',
			url			: 'functions/edit.php',
			data 		: $('form#material-edit').serialize(),
			dataType 	: 'json'
		})
		.done(function(data){
			if(data.success){ // Change
				$('div.form-control.error').removeClass('error');// Change
				$('div.form-control.success').removeClass('success');// Change
				$('div.notif-bar').css("background-color", "#0E6021");
				$('div.notif-bar').html("Material was successfully edited!");
				// $('div.modal').hide();
			}
			else{// Change WHOLE else part
				$('div.notif-bar').css("background-color", "#850038");
				$('div.notif-bar').html("An error occurred. Please check your input.");
				if(data.errors.mat_acc_num){
					$("div#accnumform").addClass('error');
					$("div#accnumform small").html(data.errors.mat_acc_num);
				}
				else{
					$("div#accnumform").addClass('success');
				}
				
				if(data.errors.mat_barcode){
					$("div#barcodeform").addClass('error');
					$("div#barcodeform small").html(data.errors.mat_barcode);
				}
				else{
					$("div#barcodeform").addClass('success');
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
				if(data.errors.mat_volume){
					$("div#volumeform").addClass('error');
					$("div#volumeform small").html(data.errors.mat_volume);
				}
				else{
					$("div#volumeform").addClass('success');
				}
				if(data.errors.mat_year){
					$("div#yearform").addClass('error');
					$("div#yearform small").html(data.errors.mat_year);
				}
				else{
					$("div#yearform").addClass('success');
				}
				if(data.errors.mat_edition){
					$("div#editionform").addClass('error');
					$("div#editionform small").html(data.errors.mat_edition);
				}
				else{
					$("div#editionform").addClass('success');
				}
				if(data.errors.mat_publisher){
					$("div#publisherform").addClass('error');
					$("div#publisherform small").html(data.errors.mat_publisher);
				}
				else{
					$("div#publisherform").addClass('success');
				}
				if(data.errors.mat_pub_year){
					$("div#publisheryearform").addClass('error');
					$("div#publisheryearform small").html(data.errors.mat_pub_year);
				}
				else{
					$("div#publisheryearform").addClass('success');
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
				if(data.errors.mat_source){
					$("div#sourceform").addClass('error');
					$("div#sourceform small").html(data.errors.mat_source);
				}
				else{
					$("div#sourceform").addClass('success');
				}
				if(data.errors.mat_lastinv_year){
					$("div#lastyearinvform").addClass('error');
					$("div#lastyearinvform small").html(data.errors.mat_lastinv_year);
				}
				else{
					$("div#lastyearinvform").addClass('success');
				}
				console.log(data);
			}// Change END else part
			$('div#loading-cover').hide();
			
		})
		.fail(function(data) {
			console.log("Fail end");
	      //Server failed to respond - Show an error message
	      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
	    });
	});
});