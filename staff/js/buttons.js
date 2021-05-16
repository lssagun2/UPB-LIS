function showPassword() {
  var x = document.getElementById("staff_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
$(document).ready(function(){
	$(document).on('click', '#staff-edit-form', function(){
		$("#staff_function").val("edit");
		$(".modal-title").html("Update My Information");
		$("button#edit-staff").html("Save changes");
		$('div#staff').show();
	});
	$(document).on('click', '.edit#deleteStaffTable', function(){
		$tr = $(this).closest('tr');
		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();
		primaryKey = data[0];
		$('div.containerDelete').append("<?php echo 'tite'?>");
		$('.modal-title').html('Delete Staff Data');
		$('div#deleteStaff').show();
	});
	$(document).on('click', '.edit#editStaffTable', function(){
		$tr = $(this).closest('tr');
		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();
		console.log(data);
		$(".modal-title").html("Edit Staff");
		$("button#submitbtn").html("Save Changes");
		$("#staff_function").val("edit");
		$('input#staff_id').val(data[0]);
		$('input#staff_username').val(data[1]);
		$('input#staff_firstname').val(data[2]);
		$('input#staff_lastname').val(data[3]);
		$('input#staff_password').val(data[4]);
		$('input#confirm_password').val(data[4]);
		$('div#staff').show();
	});
	$(document).on('click', 'button#staff-add-form', function(){
		$("#staff_function").val("add");
		$(".modal-title").html("Add Staff");
		$("button#edit-staff").html("Insert");
		$('input#staff_id').val("");
		$('input#staff_username').val("");
		$('input#staff_firstname').val("");
		$('input#staff_lastname').val("");
		$('input#staff_password').val("");
		$('input#confirm_password').val("");
		$('div#staff').show();
	});
	$(document).on('click', 'button#edit-staff', function(){
		$('form#staff').submit();
		$('input:checkbox').prop('checked', false); // Unchecks it
		$('#staff_password').attr('type','password'); //resets staffpassword
	});
	$(document).on('click', '#cancelbtn', function(){
		$('div.modal').hide();
		$('div.form-control.error').removeClass('error');	//Changes
		$('div.form-control.success').removeClass('success');	//Changes
		$('input:checkbox').prop('checked', false); // Unchecks it
		$('#staff_password').attr('type','password'); //resets staffpassword
	});
	$(document).on('click', '.close', function(){
		$('div.modal').hide();
		$('div.form-control.error').removeClass('error');	//Changes
		$('div.form-control.success').removeClass('success'); //Changes
		$('input:checkbox').prop('checked', false); // Unchecks it
		$('#staff_password').attr('type','password'); //resets staffpassword
	});
});