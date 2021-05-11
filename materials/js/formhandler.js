$(document).ready(function(){
	$("form#material").submit(function(event){
		event.preventDefault();
		$(".input-invalid").hide();
		var function_name = $("#function").val();
		console.log($('form#material').serialize());
		$.ajax({
			type 		: 'POST',
			url			: 'functions/'+function_name+'.php',
			data 		: $('form#material').serialize(),
			dataType 	: 'json'
		})
		.done(function(data){
			console.log(data);
			$("form#material").trigger("reset");
			$('div.modal').hide();
			update();
		})
		.fail(function(data) {
	      //Server failed to respond - Show an error message
	      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
	    });
	});
});