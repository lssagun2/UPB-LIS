function formhandler(){
	$.ajax({
		type 		: 'POST',
		url			: 'functions/record.php',
		data 		: $('form.accession-number').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		$("form.accession-number").trigger("reset");
		update();
	})
	.fail(function(data) {
      //Server failed to respond - Show an error message
      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}


$(document).ready(function(){
	$("form.accession-number").submit(function(event){
		event.preventDefault();
		$(".input-invalid").hide();
		formhandler();
	});
});