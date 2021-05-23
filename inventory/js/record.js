function record(){
	var data = $("form#inventory-record").serializeArray();
	data.push({name: "material_column", value: material_column});
	$('form#material-edit').trigger("reset");
	$("div#loading-cover").show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/record.php',
		data 		: $.param(data),
		dataType 	: 'json'
	})
	.done(function(data){
		var material = data.material;
		$('#id').val(material.mat_id);
		$('#acc_num').val(material.mat_acc_num);
		$('#barcode').val(material.mat_barcode);
		$('#call_number').val(material.mat_call_number);
		$('#title').val(material.mat_title);
		$('#author').val(material.mat_author);
		$('#volume').val(material.mat_volume);
		$('#year').val(material.mat_year);
		$('#edition').val(material.mat_edition);
		$('#publisher').val(material.mat_publisher);
		$('#pub_year').val(material.mat_pub_year);
		$('#circ_type').val(material.mat_circ_type)
		$('#type').val(material.mat_type);
		$('#status').val(material.mat_status);
		$('#source').val(material.mat_source);
		$('#location').val(material.mat_location);
		$('#last_year_inventoried').val(material.mat_lastinv_year);
		$('form#inventory-record').trigger('reset');
		$("div#loading-cover").hide();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}