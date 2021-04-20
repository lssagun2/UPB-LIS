$(document).ready(function(){
	$(document).on('click', '#staff-edit-form', function(){
		$("#staff_function").val("edit");
		$(".modal-title").html("Update My Information");
		$("button#edit-staff").html("Save changes");
		$('div#staff').show();
	});
	$(document).on('click', 'button#edit-staff', function(){
		$('form#staff').submit();
	});
	$(document).on('click', '#cancelbtn', function(){
		$('div.modal').hide();
	});
	$(document).on('click', '.close', function(){
		$('div.modal').hide();
	});
});