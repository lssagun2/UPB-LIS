//function that updates the contents of the tablees
function update(){
	var data = $('form#filter-form, form#limit-form, form#page-form, form#search-form').serializeArray();
	data.push(selected_filter, {name: "sort", value: sort}, {name: "sort_direction", value: sort_direction});
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/update.php',
		data 		: $.param(data),
		dataType 	: 'json'
	})
	.done(function(data){
		var limit = $("input#limit").val();
		page_count = Math.ceil(material_count/limit);
		$("span#total-pages").html(page_count);
		$("button.next").removeAttr("disabled");
		$("button.previous").removeAttr("disabled");
		if(parseInt($("input#page-number").val()) == 1){
			$("button.previous").attr("disabled", true);
		}
		if(parseInt($("input#page-number").val()) == page_count){
			$("button.next").attr("disabled", true);
		}
		$("input#page-number").attr("max", page_count);
		var body = $("tbody#material-content");
		body.empty();
		data.forEach(function(material){
			body.append(
				"<tr><td style='display:none;'>" + material.mat_id + '</td>'+
				"<td style = 'text-align: left'>" + material.mat_acc_num + "</td>"+
				"<td style = 'text-align: left'>" + material.mat_call_num + "</td>"+
				"<td style = 'text-align: left'>" + material.mat_title + "</td>"+
				"<td style = 'text-align: left'>" + material.mat_author + "</td>"+
				"<td style = 'text-align: left'>" + material.mat_publisher + "</td>"+
				"<td style = 'text-align: center'>" + material.mat_volume + "</td>"+
				"<td style = 'text-align: center'>" + material.mat_edition+ "</td>"+
				"<td style = 'text-align: center'>" + material.mat_pub_year + "</td>"+
				"<td>" + material.mat_source + "</td>"+
				"<td>" + (material.mat_price_value != 0 ? material.mat_price_currency + " " + material.mat_price_value : "") + "</td>"+
				"<td>" + material.mat_donor + "</td>"+
				"<td>" + material.mat_barcode + "</td>"+
				"<td>" + material.mat_circ_type + "</td>"+
				"<td>" + material.mat_type + "</td>"+
				"<td>" + material.mat_status + "</td>"+
				"<td>" + material.mat_location + "</td>"+
				"<td>" + (material.mat_acquisition_date != "0000-00-00" ? material.mat_acquisition_date : "") + "</td>"+
				"<td>" + material.mat_supplier + "</td>"+
				"<td>" + material.mat_inv_num + "</td>"+
				"<td style = 'text-align: center'>" + material.mat_lastinv_year + "</td>"+
				"<td>" + material.mat_remarks + "</td></tr>"
			);
		});
		$('div#loading-cover').hide();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}
