$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		$tr = $(this).closest('tr');
		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();
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
		$('div#material').show()
	});
	$(document).on('click', '.add', function(){
		$("#function").val("add");
		$(".modal-title").html("Add New Material");
		$("button#submitbtn").html("Add Material");
		$('div#material').show();
	});
	$(document).on('click', '.filter', function(){
		$(".modal-title").html("Filter Materials");
		$("button#submitbtn").html("Update");
		$('div#filter').show();
	});
	$(document).on('click', '#cancelbtn', function(){
		$("form#material").trigger("reset");
		$('div#material').hide();
	});
	$(document).on('click', '#submitbtn', function(){
		$('form#material').submit()
	});
	$(document).on('click', '.close', function(){
		$("form#material").trigger("reset");
		$('div#material').hide();
		$("form#filter-form").trigger("reset");
		$('div#filter').hide();
	});
	$(document).on('click', 'button#update-filter', function(){
		prevLastMaterial = null;
		count();
		$(".modal").hide();
	});
	$(document).on('change', 'input#limit', function(){
		if(parseInt($("input#limit").val()) < 101 && parseInt($("input#limit").val()) > 9){
			update();	
		}
	});
	$(document).on('click', 'th.sort', function(){
		sort = $(this).data("sort");
		$("input#page-number").val(1);
		prevLastMaterial = null;
		update();
	});
	$(document).on('click', 'button.previous', function(){
		$("input#page-number").val(parseInt($("input#page-number").val()) - 1);
		if(parseInt($("input#page-number").val()) == 1){
			prevLastMaterial = null;
			update();
		}
		else{
			findPage();
		}
		
	});
	$(document).on('click', 'button.next', function(){
		prevLastMaterial = lastMaterial;
		$("input#page-number").val(parseInt($("input#page-number").val()) + 1);
		update();
	});
	$("form#page-form").submit(function(event){
		event.preventDefault();
		if(parseInt($("input#page-number").val()) == 1){
			prevLastMaterial = null;
			update();
		}
		else{
			findPage();
		}
	});
	$("form#limit-form").submit(function(event){
		event.preventDefault();
		if(parseInt($("input#limit").val()) < 101 && parseInt($("input#limit").val()) > 9){
			update();	
		}
	});

	$(document).on('change', 'input#page-number', function(){
		prevLastMaterial = lastMaterial;
		if(parseInt($("input#page-number").val()) == 1){
			prevLastMaterial = null;
			update();
		}
		else{
			findPage();
		}
	});
});