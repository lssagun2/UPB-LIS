//function that creates and downloads a csv file containing the contents of the current table
function createFile(){
	var data = $('form#filter-form').serializeArray();
	data.push({name: "sort", value: sort}, {name: "sort_direction", value: sort_direction}, {name: "category", value: category});
	$('div#loading-cover').show();
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