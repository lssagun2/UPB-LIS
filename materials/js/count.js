function count(){
	$.ajax({
		type 		: 'POST',
		url			: 'functions/count.php',
		data 		: $('form#filter-form').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		material_count = data;
		console.log(material_count);
		$("input#page-number").val(1);
		update();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}