$(document).ready(function(){
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/initialize.php',
		data 		: [{name: "ajax", value: true}],
		dataType 	: 'json'
	})
	.done(function(data){
		$('a#total-number-mat').html(data.total_materials);
		$('a#number-unique-mat').html(data.unique_titles);
		loadFilters();
	})
	.fail(function(data) {
		console.log("AJAX call failed");
    });
});

