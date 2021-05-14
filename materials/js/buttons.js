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
		$('#location').val(data[15]);
		$('#last_year_inventoried').val(data[16]); // Changes
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
		$('div.form-control.error').removeClass('error'); // Changes
		$('div.form-control.success').removeClass('success'); // Changes
	});
	$(document).on('click', '#submitbtn', function(){
		$('form#material').submit()
	});
	$(document).on('click', '.close', function(){
		$("form#material").trigger("reset");
		$('div#material').hide();
		$("form#filter-form").trigger("reset");
		$('div#filter').hide();
		$('div.form-control.error').removeClass('error'); // Changes
		$('div.form-control.success').removeClass('success'); // Changes
	});
	$(document).on('click', 'button#update-filter', function(){
		count();
		$(".modal").hide();
	});
	$(document).on('change', 'input#limit', function(){
		if(parseInt(parseInt($("input#limit").val()) > 9 && $("input#limit").val()) < 101){ //check if limit is between 1 to 100 inclusive
			$("input#page-number").val(1)
			update();	
		}
	});
	$(document).on('change', 'input#page-number', function(){
		if(parseInt($("input#page-number").val()) > 0 && parseInt($("input#page-number").val()) < page_count + 1){	//check if page number is from 1 to the maximum page count
			update();
		}
	});
	$(document).on('click', 'th.sort', function(){
		if($(this).data("sort") == sort){
			sort_direction *= -1; //reverse the direction of sorting if the current sorting is same to what user clicked
		}
		else{
			sort_direction = 1; //sorting direction is ascending by default if user clicked a different column
		}
		sort = $(this).data("sort");
		$("input#page-number").val(1);	//reset the page number to 1
		update();
	});
	$(document).on('click', 'button.previous', function(){
		$("input#page-number").val(parseInt($("input#page-number").val()) - 1);	//subtract 1 from current page number
		update();
	});
	$(document).on('click', 'button.next', function(){
		$("input#page-number").val(parseInt($("input#page-number").val()) + 1);	//add 1 to current page number
		update();
	});
	$("form#page-form").submit(function(event){
		event.preventDefault();
		$("input#page-number").trigger("change");	//call onchange function for page number if form is submitted
	});
	$("form#limit-form").submit(function(event){
		event.preventDefault();
		$("input#limit").trigger("change");	//call onchange function for limit if form is submitted
	});
});
