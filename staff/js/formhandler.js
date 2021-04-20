$(document).ready(function(){
	$("form#staff").submit(function(event){
		event.preventDefault();
		$(".input-invalid").hide();
		var function_name = $("#staff_function").val();
		$.ajax({
			type 		: 'POST',
			url			: '../staff/functions/'+function_name+'.php',
			data 		: $('form#staff').serialize(),
			dataType 	: 'json'
		})
		.done(function(data){
			console.log(data);
			$('div.modal').hide();
		})
		.fail(function(data) {
	      //Server failed to respond - Show an error message
	      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
	    });
	});
});