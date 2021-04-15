$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		$tr = $(this).closest('tr');
		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();
		console.log(data);
		$(".modal-title").html("Edit Existing Material");
		$("button#submitbtn").html("Save Changes");
		$("#function").val("edit");
		$('#id').val(data[0]);
		$('#acc_num').val(data[1]);
		$('#barcode').val(data[2]);
		$('#call_number').val(data[3]);
		$('#title').val(data[4]);
		$('#author').val(data[5])
		$('#volume').val(data[6]);
		$('#year').val(data[7]);
		$('#edition').val(data[8]);
		$('#publisher').val(data[9]);
		$('#pub_year').val(data[10]);
		$('#circ_type').val(data[11])
		$('#type').val(data[12]);
		$('#status').val(data[13]);
		$('#source').val(data[14]);
		$('#last_year_inventoried').val(data[15]);
		$('div#modal1').show()
	});
	$(document).on('click', '.add', function(){
		$("#function").val("add");
		$(".modal-title").html("Add New Material");
		$("button#submitbtn").html("Add Material");
		$('div#modal1').show();
	});


	$(document).on('click', '.editmyaccount', function(){
		$("#function").val("edit");
		$(".modal-title").html("Edit My Account");
		$("button#submitbtnEditAcc").html("Save Changes");
		$('div#modal2').show();
	});


	$(document).on('click', '#submitbtnEditAcc', function(){
		$('form#modal-content2').submit();
	});


	$(document).on('click', '#cancelbtn', function(){
		$("form.modal-content").trigger("reset");
		$('div.modal').hide();
	});
	$(document).on('click', '#submitbtn', function(){
		$('form#modal-content1').submit();
	});
	$(document).on('click', '.close', function(){
		$("form.modal-content").trigger("reset");
		$('div.modal').hide();
	});
});