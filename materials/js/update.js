//function that updates the contents of the tablees
function update(){
	var data = $('form#filter-form, form#limit-form, form#page-form').serializeArray();
	data.push({name: "sort", value: sort}, {name: "sort_direction", value: sort_direction});
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
		if(parseInt($("input#page-number").val()) == 1){
			$("button.previous").attr("disabled", true);
			$("button.next").removeAttr("disabled");
		}
		else if(parseInt($("input#page-number").val()) == page_count){
			$("button.next").attr("disabled", true);
			$("button.previous").removeAttr("disabled");
		}
		else{
			$("button.next").removeAttr("disabled");
			$("button.previous").removeAttr("disabled");
		}
		$("input#page-number").attr("max", page_count);
		var body = $("tbody");
		body.empty();
		data.forEach(function(material){
			var tr = $('<tr/>').appendTo(body);
			tr.append("<td style='display:none;'>" + material.mat_id + '</td>');
			tr.append("<td>" + material.mat_acc_num + "</td>");
			tr.append("<td>" + material.mat_barcode + "</td>");
			tr.append("<td>" + material.mat_call_num + "</td>");
			tr.append("<td>" + material.mat_title + "</td>");
			tr.append("<td>" + material.mat_author + "</td>");
			tr.append("<td>" + material.mat_volume + "</td>");
			tr.append("<td>" + material.mat_year + "</td>");
			tr.append("<td>" + material.mat_edition+ "</td>");
			tr.append("<td>" + material.mat_publisher + "</td>");
			tr.append("<td>" + material.mat_pub_year + "</td>");
			tr.append("<td>" + material.mat_circ_type + "</td>");
			tr.append("<td>" + material.mat_type + "</td>");
			tr.append("<td>" + material.mat_status + "</td>");
			tr.append("<td>" + material.mat_source + "</td>");
			tr.append("<td>" + material.mat_location + "</td>");
			tr.append("<td>" + material.mat_lastinv_year + "</td>");
			tr.append("<td><button class = 'edit' style = 'width: 50px; height: 50px; color: #000;'><i class = 'fas fa-edit'></i></button></td>")
		})
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}