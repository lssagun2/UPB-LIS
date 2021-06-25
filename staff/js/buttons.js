//Script File containing all button objects for staff page.

//Hide password mechanism.
function showPassword() {
  var x = document.getElementById("staff_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

//Button object for editing staff account of the user.
$(document).ready(function(){
	$(document).on('click', '#staff-edit-form', function(){
		$("#staff_function").val("edit");
		$(".modal-title").html("Update My Information");
		$("button#edit-staff").html("Save changes");
		$("input#confirm_password").val("");
		$('div#staff').show();
	});

//Button object for editing staff account in the staff table.
$(document).on('click', '#editStaffTable', function(){
		//Fetching all the data of specified user account and displaying it on the modal.
		$tr = $(this).closest('tr');
		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();
		console.log(data);
		$(".modal-title").html("Edit Staff");
		$("button#edit-staff").html("Save Changes");
		$("#staff_function").val("edit");
		$('input#staff_id').val(data[0]);
		$('input#staff_username').val(data[1]);
		$('input#staff_firstname').val(data[2]);
		$('input#staff_lastname').val(data[3]);
		$('input#staff_password').val(data[4]);
		$('input#confirm_password').val(data[4]);
		$('#staff_type').val(data[5]);
		$('div#staff').show();
	});

	//Button object for adding staff
	$(document).on('click', 'button#staff-add-form', function(){
		$("#staff_function").val("add");
		$(".modal-title").html("Add Staff");
		$("button#edit-staff").html("Add");
		$('input#staff_id').val("");
		$('input#staff_username').val("");
		$('input#staff_firstname').val("");
		$('input#staff_lastname').val("");
		$('input#staff_password').val("");
		$('input#confirm_password').val("");
		$('div#staff').show();
	});

	//Button object for deactivating staff.
	$(document).on('click', '#deleteStaff', function(){
		//Fetching all the data of specified user account and displaying it on the modal.
		var tr = $(this).closest('tr');
		var data = tr.children("td").map(function(){
			return $(this).text();
		}).get();
		console.log(data);
		$('#primaryKey').val(data[0]);
		$('#username').val(data[1]);
		$('#firstname').val(data[2]);
		$('#lastname').val(data[3]);
		$('.modal-title').html('Delete Staff');
		$('input#change-active-function').val('delete');
		$('span#change-active').html('delete');
		$('button#change-active-confirm').html('Delete');
		$('div#change-active-div').show();
	});

	//Button object for reactivating/restoring staff account.
	$(document).on('click', '#restoreStaff', function(){
		//Fetching all the data of specified user account and displaying it on the modal.
		var tr = $(this).closest('tr');
		var data = tr.children("td").map(function(){
			return $(this).text();
		}).get();
		console.log(data);
		$('#primaryKey').val(data[0]);
		$('#username').val(data[1]);
		$('#firstname').val(data[2]);
		$('#lastname').val(data[3]);
		$('.modal-title').html('Restore Staff');
		$('input#change-active-function').val('restore');
		$('span#change-active').html('restore');
		$('button#change-active-confirm').html('Restore');
		$('div#change-active-div').show();
	});

	//Button object for submitting staff form.
	$(document).on('click', 'button#edit-staff', function(){
		$('form#staff').submit();
		$('#staff_password').attr('type','password'); //resets staffpassword design
	});

	//Button object for deactivating staff account.
	$(document).on('click', 'button#change-active-confirm', function(){
		$('form#change-active-form').submit();
	});

	$(document).on('click', '#cancelbtn', function(){
		$('div.modal').hide();
		$('div.form-control.error').removeClass('error');	
		$('div.form-control.success').removeClass('success');
		$('#staff_password').attr('type','password'); //resets staffpassword
	});
	$(document).on('click', '.close', function(){
		$('div.modal').hide();
		$('div.form-control.error').removeClass('error');	
		$('div.form-control.success').removeClass('success'); 
		$('#staff_password').attr('type','password'); //resets staffpassword
	});

	//Updating staff table upon selecting filter.
	$(document).on('change', 'select#active-filter', function(){
		update();
	});
});