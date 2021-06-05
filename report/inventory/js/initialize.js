$(document).ready(function(){
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/initialize.php',
		data 		: [{name: "year", value: $("span#report_year").html()}],
		dataType 	: 'json'
	})
	.done(function(data){
		$("a#total-number-mat").html(data.total);
		$("a#inventoried").html(data.inventoried);
		$("a#not-inventoried").html(data.not_inventoried);
		loadFilters();
	})
	.fail(function(data) {
		console.log("AJAX call failed");
    });
});

