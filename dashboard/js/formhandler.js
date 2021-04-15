// function showAddForm(){
// 	$("form.modal-content").attr("id", "add-form");
// 	$("div.modal").show();
// 	$("form.modal-content").load(encodeURI("tools/add/form.php"));
// }
// function showEditForm(){
// 	$("form.modal-content").attr("id", "edit-form");
// 	$("div.modal").show();
// 	$("form.modal-content").load(encodeURI("tools/edit/form.php"));
// 	$('#id').val(data[0]);
// 	$('#acc_num').val(data[1]);
// 	$('#barcode').val(data[2]);
// 	$('#call_number').val(data[3]);
// 	$('#title').val(data[4]);
// 	$('#author').val(data[5])
// 	$('#volume').val(data[6]);
// 	$('#year').val(data[7]);
// 	$('#edition').val(data[8]);
// 	$('#publisher').val(data[9]);
// 	$('#pub_year').val(data[10]);
// 	$('#circ_type').val(data[11])
// 	$('#type').val(data[12]);
// 	$('#status').val(data[13]);
// 	$('#source').val(data[14]);
// 	$('#last_year_inventoried').val(data[15]);
// }


function formhandler(function_name){
	$.ajax({
		type 		: 'POST',
		url			: 'functions/'+function_name+'.php',
		data 		: $('form#modal-content1').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		$("form#modal-content1").trigger("reset");
		$('div#modal1').hide();
		update();
	})
	.fail(function(data) {
      //Server failed to respond - Show an error message
      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}


function formhandler2(function_name){
	$.ajax({
		type 		: 'POST',
		url			: 'functions/'+function_name+'.php',
		data 		: $('form#modal-content2').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		$("form#modal-content2").trigger("reset");
		$('div#modal2').hide();
		location.reload();
	})
	.fail(function(data) {
      //Server failed to respond - Show an error message
      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}


$(document).ready(function(){
	$("form#modal-content1").submit(function(event){
		event.preventDefault();
		$(".input-invalid").hide();
		var function_name = $("#function").val();
		console.log($('form#modal-content1').serialize());
		formhandler(function_name);
	});

	$("form#modal-content2").submit(function(event){
		event.preventDefault();
		$(".input-invalid").hide();
		var function_name = $("#function").val();
		console.log($('form#modal-content2').serialize());
		formhandler2(function_name);
	});

});