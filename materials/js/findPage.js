function findPage(){
	var data = $('form#filter-form, form#limit-form, form#page-form').serializeArray();
	data.push({name: "sort", value: sort});
	console.log($.param(data));
	$.ajax({
		type 		: 'POST',
		url			: 'functions/findPage.php',
		data 		: $.param(data),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		prevLastMaterial = data;
		update();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}