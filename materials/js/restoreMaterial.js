//function that creates the AJAX call for restoring materials
function restoreMaterial(){
	console.log($('form#material').serialize());
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/restore.php',
		data 		: $('form#material').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		$('div.modal').hide();
		update();
		$('h3#success-text').html('The material was successfully restored!');
		$('button#success-button').hide();
		$('div#success-notification').show();
	})
	.fail(function(data){
		console.log("Fail end");
      //Server failed to respond - Show an error message
      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}