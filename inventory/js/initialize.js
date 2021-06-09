$(document).ready(function(){
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/filter-contents.php',
		data 		: null,
		dataType 	: 'json'
	})
	.done(function(data){
		data.circ_type.forEach(function(value){
			$(".circ-type-list").append("<option value = '" + value + "'>" + value + "</option>");
		});
		data.type.forEach(function(value){
			$(".type-list").append("<option value = '" + value + "'>" + value + "</option>");
		});
		data.status.forEach(function(value){
			$(".status-list").append("<option value = '" + value + "'>" + value + "</option>");
		});
		data.location.forEach(function(value){
			$(".location-list").append("<option value = '" + value + "'>" + value + "</option>");
		});
		$('div#loading-cover').hide();
	})
	.fail(function(data) {
		console.log("AJAX call failed");
    });
});

