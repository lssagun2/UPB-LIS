//Script File containing all button objects for staff page.

var directory;
var personal;

//Hide password mechanism.
function showPassword() {
  var x = document.getElementById("staff_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
$(document).ready(function(){
	//triggered when staff chose to edit personal information
	$(document).on('click', '#staff-edit-form', function(){
		personal = true;
		directory = $(this).data('directory');
		$("#staff_function").val("edit");
		$('input#staff_id').val($('input#staff_id').data('default'));
		$('input#staff_username').val($('input#staff_username').data('default'));
		$('input#staff_firstname').val($('input#staff_firstname').data('default'));
		$('input#staff_lastname').val($('input#staff_lastname').data('default'));
		$('input#staff_password').val($('input#staff_password').data('default'));
		$('input#confirm_password').val($('input#confirm_password').data('default'));
		$('select#staff_type').val($('select#staff_type').data('default'));
		$(".modal-title").html("Update My Information");
		$("button#edit-staff").html("Save changes");
		$("input#confirm_password").val("");
		$('div#staff').show();
	});
	//triggered when staff chose to edit information on table
	$(document).on('click', '#editStaffTable', function(){
		personal = false;
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
	//trigerred when staff chose to add new staff
	$(document).on('click', 'button#staff-add-form', function(){
		personal = false;
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
	//triggered when staff chose to delete a staff
	$(document).on('click', '#deleteStaff', function(){
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
	//triggered when staff chose to restore a staff
	$(document).on('click', '#restoreStaff', function(){
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
	//triggered when user submitted the form in editing materials
	$(document).on('click', 'button#edit-staff', function(){
		$('form#staff').submit();
		// $('input:checkbox').prop('checked', false); // Unchecks it
		$('#staff_password').attr('type','password'); //resets staffpassword
	});
	//triggered when user deactivated/activated account
	$(document).on('click', 'button#change-active-confirm', function(){
		$('form#change-active-form').submit();
	});

	$(document).on('click', '#cancelbtn', function(){
		$('div.modal').hide();
		$('div.form-control.error').removeClass('error')
		$('div.form-control.success').removeClass('success');
		$('#staff_password').attr('type','password'); //resets staffpassword
	});
	$(document).on('click', '.close', function(){
		$('div.modal').hide();
		$('div.form-control.error').removeClass('error');
		$('div.form-control.success').removeClass('success');
		$('#staff_password').attr('type','password'); //resets staffpassword
	});
	//triggered when user changed the current filter for staff
	$(document).on('change', 'select#active-filter', function(){
		update();
	});
});