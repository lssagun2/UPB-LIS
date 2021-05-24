//function that updates the contents of the tablees
function update(){
	var data = $('form#filter-form, form#limit-form, form#page-form').serializeArray();
	data.push({name: "sort", value: sort}, {name: "sort_direction", value: sort_direction}, {name: "comparison", value: comparison}, {name: "category", value: category}, {name: "year1", value: year1}, {name: "year2", value: year2});
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
		var body = $("#material-content");
		body.empty();
		data.forEach(function(row){
			var content = "<tr><td style='display:none;'>" + row.mat_id + "</td>";
			if(!comparison && category == 1){
				content +=
					"<td>" + row.year + "</td>"+
					"<td>" + row.staff_firstname + " " + row.staff_lastname + "</td>";
			}
			content +=
				"<td>" + row.mat_acc_num + "</td>"+
				"<td>" + row.mat_barcode + "</td>"+
				"<td>" + row.mat_call_num + "</td>"+
				"<td>" + row.mat_title + "</td>"+
				"<td>" + row.mat_author + "</td>"+
				"<td>" + row.mat_volume + "</td>"+
				"<td>" + row.mat_year + "</td>"+
				"<td>" + row.mat_edition+ "</td>"+
				"<td>" + row.mat_publisher + "</td>"+
				"<td>" + row.mat_pub_year + "</td>"+
				"<td>" + row.mat_circ_type + "</td>"+
				"<td>" + row.mat_type + "</td>"+
				"<td>" + row.mat_status + "</td>"+
				"<td>" + row.mat_source + "</td>"+
				"<td>" + row.mat_location + "</td>"+
				"<td>" + row.mat_lastinv_year + "</td></tr>";
			body.append(content);
		});
		$('div#loading-cover').hide();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}
