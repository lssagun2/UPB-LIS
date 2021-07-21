//function that updates the contents of the tables
function update(){
	var data = $('form#filter-form, form#limit-form, form#page-form, form#search-form').serializeArray();
	data.push({name: "sort", value: sort}, {name: "sort_direction", value: sort_direction});
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/update.php',
		data 		: $.param(data),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
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
		var body = $("tbody");
		body.empty();
		data.forEach(function(material){
			var tr = $('<tr/>').appendTo(body);
			tr.append("<td style='display:none;'>" + material.mat_id + '</td>');
			tr.append("<td style = 'text-align: left'>" + material.mat_acc_num + "</td>");
			tr.append("<td style = 'text-align: left'>" + material.mat_call_num + "</td>");
			tr.append("<td style = 'text-align: left'>" + material.mat_title + "</td>");
			tr.append("<td style = 'text-align: left'>" + material.mat_author + "</td>");
			tr.append("<td style = 'text-align: left'>" + material.mat_publisher + "</td>");
			tr.append("<td style = 'text-align: center'>" + material.mat_volume + "</td>");
			tr.append("<td style = 'text-align: center'>" + material.mat_edition+ "</td>");
			tr.append("<td style = 'text-align: center'>" + material.mat_pub_year + "</td>");
			tr.append("<td style = 'text-align: center'>" + material.mat_source + "</td>");
			tr.append("<td style = 'text-align: center'>" + (material.mat_price_value != 0 ? material.mat_price_currency + " " + material.mat_price_value : "") + "</td>");
			tr.append("<td>" + material.mat_donor + "</td>");
			tr.append("<td>" + material.mat_barcode + "</td>");
			tr.append("<td>" + material.mat_circ_type + "</td>");
			tr.append("<td>" + material.mat_type + "</td>");
			tr.append("<td>" + material.mat_status + "</td>");
			tr.append("<td>" + material.mat_location + "</td>");
			tr.append("<td>" + material.mat_supplier + "</td>");
			tr.append("<td>" + (material.mat_acquisition_date != "0000-00-00" ? material.mat_acquisition_date : "") + "</td>");
			tr.append("<td>" + material.mat_inv_num + "</td>");
			tr.append("<td style = 'text-align: center'>" + material.mat_lastinv_year + "</td>");
			tr.append("<td style = 'text-align: center'>" + material.mat_remarks + "</td>");
			tr.append("<td><button class = 'edit' style = 'width: 50px; height: 50px; color: #000;'><i class = 'fas fa-edit'></i></button><button class = 'delete' style = 'width: 50px; height: 50px; color: #000;'><i class = 'fas fa-trash-alt'></i></button></td>");
		});
		$('div#loading-cover').hide();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}
