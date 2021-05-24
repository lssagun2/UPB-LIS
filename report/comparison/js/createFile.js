//function that updates the contents of the tablees
function createFile(){
	var data = $('form#filter-form, form#limit-form, form#page-form').serializeArray();
	data.push({name: "sort", value: sort}, {name: "sort_direction", value: sort_direction}, {name: "comparison", value: comparison}, {name: "category", value: category}, {name: "year1", value: year1}, {name: "year2", value: year2});
	$('div#loading-cover').show();
	console.log($.param(data));
	$.ajax({
		type 		: 'POST',
		url			: 'functions/createFile.php',
		data 		: $.param(data),
		dataType 	: 'json'
	})
	.done(function(data){
		downloadFile(data.file, data.filename);
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}
