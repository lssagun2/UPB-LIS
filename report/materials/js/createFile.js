//function that creates and downloads a csv file containing the contents of the current table
function createFile(){
	var data = $('form#filter-form, form#limit-form, form#page-form').serializeArray();
	data.push(selected_filter, {name: "sort", value: sort}, {name: "sort_direction", value: sort_direction});
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
