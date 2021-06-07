$(document).ready(function(){
	$('i.sort-by-asc').hide();
	$('i.sort-by-desc').hide();
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/initialize.php',
		data 		: [{name: "year", value: $("span#report_year").html()}],
		dataType 	: 'json'
	})
	.done(function(data){
		if(data.new_acquired){
			$("a#new-acquired").html(data.new_acquired);
		}
		else{
			$(".new-acquired").hide();
		}
		$("a#total-number-mat").html(data.total);
		$("a#inventoried").html(data.inventoried);
		$("a#not-inventoried").html(data.not_inventoried);
		$("a#not-acquired").html(data.not_acquired);
		loadFilters();
	})
	.fail(function(data) {
		console.log("AJAX call failed");
    });
});

