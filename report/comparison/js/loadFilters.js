function loadFilters(){
	$.ajax({
		type 		: 'POST',
		url			: '../common/filter-contents.php',
		data 		: null,
		dataType 	: 'json'
	})
	.done(function(data){
		data.mat_circ_type.forEach(function(row){
			$("select#circtype-filter").append("<option value = '" + row.mat_circ_type + "'>" + row.mat_circ_type + "</option>");
		});
		data.mat_type.forEach(function(row){
			$("select#type-filter").append("<option value = '" + row.mat_type + "'>" + row.mat_type + "</option>");
		});
		data.mat_status.forEach(function(row){
			$("select#status-filter").append("<option value = '" + row.mat_status + "'>" + row.mat_status + "</option>");
		});
		data.mat_location.forEach(function(row){
			$("select#location-filter").append("<option value = '" + row.mat_location + "'>" + row.mat_location + "</option>");
		});
		$('div#loading-cover').hide();
	})
	.fail(function(data) {
		console.log("AJAX call failed");
    });
}

