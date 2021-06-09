function addFilters(){
	var newFilters = [];
	if($('input#circ_type').val() != "" && !circ_type_filter.includes($('input#circ_type').val())){
		circ_type_filter.push($('input#circ_type').val());
		newFilters.push({name: 'circ_type', value: $('input#circ_type').val()});
		$(".circ-type-list").append("<option value = '" + $('input#circ_type').val() + "'>" + $('input#circ_type').val() + "</option>");
	}
	if($('input#type').val() != "" && !type_filter.includes($('input#type').val())){
		type_filter.push($('input#type').val());
		newFilters.push({name: 'type', value: $('input#type').val()});
		$(".type-list").append("<option value = '" + $('input#type').val() + "'>" + $('input#type').val() + "</option>");
	}
	if($('input#status').val() != "" && !status_filter.includes($('input#status').val())){
		status_filter.push($('input#status').val());
		newFilters.push({name: 'status', value: $('input#status').val()});
		$(".status-list").append("<option value = '" + $('input#status').val() + "'>" + $('input#status').val() + "</option>");
	}
	if($('input#location').val() != "" && !location_filter.includes($('input#location').val())){
		location_filter.push($('input#location').val());
		newFilters.push({name: 'location', value: $('input#location').val()});
		$(".location-list").append("<option value = '" + $('input#location').val() + "'>" + $('input#location').val() + "</option>");
	}
	console.log(newFilters);
	if(newFilters.length != 0){
		$.ajax({
		type 		: 'POST',
		url			: 'functions/addFilters.php',
		data 		: newFilters,
		dataType 	: 'json'
		})
		.done(function(data){
			console.log(data);
			$("form#material").trigger("reset");
			$('div.modal').hide();
			update();
		})
		.fail(function(data) {
			console.log("Fail end");
	      //Server failed to respond - Show an error message
	      // $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
	    });
	}
	else{
		$('div.modal').hide();
		if(function_name == "add"){
			$('h3#success-text').html('The material was inserted successfully!');
			$('button#success-button').html('Add Another Material');
			$('div#success-notification').show();
		}
		if(function_name == "edit"){
			$('h3#success-text').html('The material was edited successfully!');
			$('button#success-button').html('Edit Same Material');
			$('div#success-notification').show();
		}
		update();
	}
}