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
				"<td>" + material.mat_acc_num + "</td>"+
				"<td>" + material.mat_barcode + "</td>"+
				"<td>" + material.mat_call_num + "</td>"+
				"<td>" + material.mat_title + "</td>"+
				"<td>" + material.mat_author + "</td>"+
				"<td>" + material.mat_volume + "</td>"+
				"<td>" + material.mat_year + "</td>"+
				"<td>" + material.mat_edition+ "</td>"+
				"<td>" + material.mat_publisher + "</td>"+
				"<td>" + material.mat_pub_year + "</td>"+
				"<td>" + material.mat_circ_type + "</td>"+
				"<td>" + material.mat_type + "</td>"+
				"<td>" + material.mat_status + "</td>"+
				"<td>" + material.mat_source + "</td>"+
				"<td>" + material.mat_location + "</td>"+
				"<td>" + material.mat_lastinv_year + "</td></tr>"
			);
		});
		$('div#loading-cover').hide();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}
