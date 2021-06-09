$(document).ready(function(){
	$('i.sort-by-asc').hide();
	$('i.sort-by-desc').hide();
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/filter-contents.php',
		data 		: null,
		dataType 	: 'json'
	})
	.done(function(data){
		circ_type_filter = data.circ_type;
		circ_type_filter.forEach(function(value){
			$(".circ-type-list").append("<option value = '" + value + "'>" + value + "</option>");
		});
		type_filter = data.type;
		type_filter.forEach(function(value){
			$(".type-list").append("<option value = '" + value + "'>" + value + "</option>");
		});
		status_filter = data.status;
		status_filter.forEach(function(value){
			$(".status-list").append("<option value = '" + value + "'>" + value + "</option>");
		});
		location_filter = data.location;
		location_filter.forEach(function(value){
			$(".location-list").append("<option value = '" + value + "'>" + value + "</option>");
		});
		count();
	})
	.fail(function(data) {
		console.log("AJAX call failed");
    });
});

