//function that creates the AJAX call for deleting materials
function deleteMaterial(){
	console.log($('form#material').serialize());
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/delete.php',
		data 		: $('form#material').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		$('div.modal').hide();
		update();
		$('h3#success-text').html('The material was successfully deleted!');
		$('button#success-button').show();
		$('button#success-button').html('Undo Delete');
		$('div#success-notification').show();
	})
	.fail(function(data){
		console.log("Fail end");
      //Server failed to respond - Show an error message
      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}