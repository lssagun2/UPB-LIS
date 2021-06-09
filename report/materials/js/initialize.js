$(document).ready(function(){
	$('i.sort-by-asc').hide();
	$('i.sort-by-desc').hide();
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
		data.mat_circ_type.forEach(function(row){
			$("select#circtype-filter").append("<option value = '" + row.mat_circ_type + "'>" + row.mat_circ_type + "</option>");
			$("table#circtype-report").append("<tr class = 'change-filter' data-filter = 'circtype-filter' data-filter-value = '" + row.mat_circ_type + "'>"+
              "<th>" + row.mat_circ_type + ":</th>" +
              "<td style = 'border: 1px solid 0.5; outline: none; width: 50%; text-align: center;'>" + row.count + "</td>" +
            "</tr>");
		});
		data.mat_type.forEach(function(row){
			$("select#type-filter").append("<option value = '" + row.mat_type + "'>" + row.mat_type + "</option>");
			$("table#type-report").append("<tr class = 'change-filter' data-filter = 'type-filter' data-filter-value = '" + row.mat_type + "'>"+
              "<th>" + row.mat_type + ":</th>" +
              "<td style = 'border: 1px solid 0.5; outline: none; width: 50%; text-align: center;'>" + row.count + "</td>" +
            "</tr>");
		});
		data.mat_status.forEach(function(row){
			$("select#status-filter").append("<option value = '" + row.mat_status + "'>" + row.mat_status + "</option>");
			$("table#status-report").append("<tr class = 'change-filter' data-filter = 'status-filter' data-filter-value = '" + row.mat_status + "'>"+
              "<th>" + row.mat_status + ":</th>" +
              "<td style = 'border: 1px solid 0.5; outline: none; width: 50%; text-align: center;'>" + row.count + "</td>" +
            "</tr>");
		});
		data.mat_location.forEach(function(row){
			$("select#location-filter").append("<option value = '" + row.mat_location + "'>" + row.mat_location + "</option>");
			$("table#location-report").append("<tr class = 'change-filter' data-filter = 'location-filter' data-filter-value = '" + row.mat_location + "'>"+
              "<th>" + row.mat_location + ":</th>" +
              "<td style = 'border: 1px solid 0.5; outline: none; width: 50%; text-align: center;'>" + row.count + "</td>" +
            "</tr>");
		});
		$('div#loading-cover').hide();
	})
	.fail(function(data) {
		console.log("AJAX call failed");
    });
});

