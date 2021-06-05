$(document).ready(function(){
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/initialize.php',
		data 		: [{name: "year1", value: $("h2#year1").html()}, {name: "year2", value: $("h2#year2").html()}],
		dataType 	: 'json'
	})
	.done(function(data){
		$('td#inventoried_year1').html(data.inventoried_year1);
		$('td#not_inventoried_year1').html(data.not_inventoried_year1);
		$('td#not_acquired_year1').html(data.not_acquired_year1);
		$('td#inventoried_year2').html(data.inventoried_year2);
		$('td#not_inventoried_year2').html(data.not_inventoried_year2);
		$('td#not_acquired_year2').html(data.not_acquired_year2);
		$('h3#category_0').html(data.category_0);
		$('h3#category_1').html(data.category_1);
		$('h3#category_2').html(data.category_2);
		$('h3#category_3').html(data.category_3);
		loadFilters();
	})
	.fail(function(data) {
		console.log("AJAX call failed");
    });
});
