function staffTableUpdate(){
	$("table#staffTable").load(encodeURI("functions/update.php"));
}

function modifyStaff(directory, function_name){
	$.ajax({
		type 		: 'POST',
		url			: directory + 'functions/' + function_name + '.php',
		data 		: $('form#staff').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		if(data.success){
			//Resets all input design after submitting invalid inputs.
			$('div.form-control.error').removeClass('error');
			$('div.form-control.success').removeClass('success');
			$('div.modal').hide();
			if(!personal){
				update();	//update staff table if editing is conducted there
			}
			else{
				//Reset staff default information after successful updating of information
				$('input#staff_id').data('default', $('input#staff_id').val());
				$('input#staff_username').data('default', $('input#staff_username').val());
				$('input#staff_firstname').data('default', $('input#staff_firstname').val());
				$('input#staff_lastname').data('default', $('input#staff_lastname').val());
				$('input#staff_password').data('default', $('input#staff_password').val());
				$('input#confirm_password').data('default', $('input#confirm_password').val());
				$('select#staff_type').data('default', $('select#staff_type').val());
			}
		}
		else{
			//Prompting success/error inputs after submitting staff form.
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
}
//Deactivating user account.
$(document).ready(function(){
	$("form#staff").submit(function(event){
		$('div.form-control.error').removeClass('error');
		$('div.form-control.success').removeClass('success');
		event.preventDefault();
		$(".input-invalid").hide();
		var function_name = $("#staff_function").val();
		modifyStaff(directory, function_name);
	});
	$("form#change-active-form").submit(function(event){
		$('div.form-control.error').removeClass('error');
		$('div.form-control.success').removeClass('success');
		event.preventDefault();
		$(".input-invalid").hide();
		var function_name = $("#staff_function").val();
		//Process the inputs using a defined function for deactivating staff account.
		$.ajax({
			type 		: 'POST',
			url			: '../staff/functions/change-active.php',
			data 		: $('form#change-active-form').serialize(),
			dataType 	: 'json'
		})
		.done(function(data){
			$('div.modal').hide();
			update();
		})
		.fail(function(data) {
			console.log(data);
	      //Server failed to respond - Show an error message
	      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
	    });
	});


});
