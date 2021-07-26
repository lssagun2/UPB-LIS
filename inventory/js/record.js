function record(){
	var data = $("form#inventory-record").serializeArray();
	data.push({name: "material_column", value: material_column});
	$('#inventory-input-div').removeClass('error');// Resets "form-control" class every record()
	$('#inventory-input-div').removeClass('success');// Resets "form-control" class every record()
	$('form#material-edit').trigger("reset");
	$('div.notif-bar').hide();
	$("div#loading-cover").show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/record.php',
		data 		: $.param(data),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		if(data.success){
			$('fieldset#material-fieldset').removeAttr("disabled");
			var material = data.material;
			$('#id').val(material.mat_id);
			$('#acc_num').val(material.mat_acc_num);
			$('#barcode').val(material.mat_barcode);
			$('#call_number').val(material.mat_call_number);
			$('#title').val(material.mat_title);
			$('#author').val(material.mat_author);
			$('#volume').val(material.mat_volume);
			$('#edition').val(material.mat_edition);
			$('#publisher').val(material.mat_publisher);
			$('#pub_year').val(material.mat_pub_year);
			$('#circ_type').val(material.mat_circ_type)
			$('#type').val(material.mat_type);
			$('#status').val(material.mat_status);
			$('#location').val(material.mat_location);
			$('#source').val(material.mat_source);
			$("div#priceform").hide();
			$("div#donorform").hide();
			if(material.mat_price_value != 0){
				$('#currency').val(material.mat_price_currency);
				$('#price').val(material.mat_price_value);
			}
			else{
				$('#currency').val("PHP");
				$('#price').val("");
			}
			if(material.mat_source == "Purchased"){
				$("div#priceform").show();
			}
			else if(material.mat_source == "Donated"){
				$("div#donorform").show();
			}
			$('#acquisition_date').val(material.mat_acquisition_date);
			$('#property_inv_num').val(material.mat_property_inv_num);
			$('#inv_num').val(material.mat_inv_num);
			$('#last_year_inventoried').val(material.mat_lastinv_year);
			$('#remarks').val(material.mat_remarks);
			$('form#inventory-record').trigger('reset');
			$('div.notif-bar').show();
			$('div.notif-bar').html(data.message);
			$("div#inventory-input-div").addClass('success');
			if(data.inventoried){
				$('div.notif-bar').css("background-color", "#0E6021");
			}
			else{
				$('div.notif-bar').css("background-color", "#850038");
			}
		}
		else{
			$('fieldset#material-fieldset').attr("disabled", "disabled");
			$('div.notif-bar').css("background-color", "#850038");
			$('div.notif-bar').html(data.message);
			$('div.notif-bar').show();
			$("div#inventory-input-div").addClass('error');
			$("div#inventory-input-div small").html(data.message);
			if(material_column == "mat_barcode"){
				$('form#inventory-record').trigger('reset');
			}
		}
		
		$("div#loading-cover").hide();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}
