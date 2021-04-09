function validate(){
	$.ajax({
		type 		: 'POST',
		url			: "verify.php",
		data 		: $('form.login-form').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		if(!data.success){
			if(data.errors.username){
				$(".input-invalid#username").html(data.errors.username);
				$(".input-invalid#username").show();
			}
			if(data.errors.password){
				$(".input-invalid#password").html(data.errors.password);
				$(".input-invalid#password").show();
			}
		}
		else{
			window.location.replace(data.link);
		}
		return;
	})
	.fail(function(data) {
      //Server failed to respond - Show an error message
      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}


$(document).ready(function(){
	$("form.login-form").submit(function(event){
		$(".input-invalid").hide();
		validate();
		event.preventDefault();
	});
});