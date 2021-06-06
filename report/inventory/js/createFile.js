//function that creates and downloads a csv file containing the contents of the current table
function createFile(){
	var data = $('form#filter-form, form#search-form').serializeArray();
	data.push({name: "sort", value: sort}, {name: "sort_direction", value: sort_direction}, {name: "category", value: category}, {name: "year", value: $("span#report_year").html()});
	$('div#loading-cover').show();
	console.log($.param(data));
	$.ajax({
		type 		: 'POST',
		url			: 'functions/createFile.php',
		data 		: data,
		dataType 	: 'json'
	})
	.done(function(data){
		downloadFile(data.file, data.filename);
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}