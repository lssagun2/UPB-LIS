function staffTableUpdate(){
	$("table#inventory").load(encodeURI("functions/update.php"));
}
$(document).ready(function(){
	$("form#staff").submit(function(event){
		$('div.form-control.error').removeClass('error');
		$('div.form-control.success').removeClass('success');
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
			if(data.success){
				console.log(data);
				console.log($('form#staff').serialize());
				$('div.form-control.error').removeClass('error');
				$('div.form-control.success').removeClass('success');
				$('div.modal').hide();
				staffTableUpdate();
			}
			else{
				console.log(data);
				console.log($('form#staff').serialize());
				if(data.errors.staff_username){
					$('div#usernameform').addClass('error');
					$('div#usernameform small').html(data.errors.staff_username);
				}
				else{
					$('div#usernameform').addClass('success');
				}
				if(data.errors.staff_firstname){
					$('div#firstnameform').addClass('error');
					$('div#firstnameform small').html(data.errors.staff_firstname);
				}
				else{
					$('div#firstnameform').addClass('success');
				}
				if(data.errors.staff_lastname){
					$('div#lastnameform').addClass('error');
					$('div#lastnameform small').html(data.errors.staff_lastname);
				}
				else{
					$('div#lastnameform').addClass('success');
				}
				if(data.errors.staff_password){
					$('div#passwordform').addClass('error');
					$('div#passwordform small').html(data.errors.staff_password);
				}
				else{
					$('div#passwordform').addClass('success');
				}
				if(data.errors.confirm_password){
					$('div#confirmpasswordform').addClass('error');
					$('div#confirmpasswordform small').html(data.errors.confirm_password);
				}
				else{
					$('div#confirmpasswordform').addClass('success');
				}

			}
			

		})
		.fail(function(data) {
	      //Server failed to respond - Show an error message
	      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
	    });
	});
});
