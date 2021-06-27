//Script file containing all button objects for materials page.

$(document).ready(function(){
	//Button object for editing material
	$(document).on('click', '.edit', function(){
		$("form#material").trigger("reset");
		//Fetch all data of a particular row for displaying purposes.
		$tr = $(this).closest('tr');
		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();
		console.log(data);
		$(".modal-title").html("Edit Existing Material");
		$("button#submitbtn").html("Save Changes");

		//load material information into the form
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
		$('#location').val(data[14]);
		$('#source').val(data[15]);
		var price = data[16].split(" ");
		if(price.length != 1){
			$('#currency').val(price[0]);
			$('#price').val(price[1]);
		}
		var date = data[17].split("-");
		if(date.length != 1){
			$('#acquisition_year').val(date[0]);
			$('#acquisition_month').val(date[1]);
			$('#acquisition_day').val(date[2]);
		}
		$('#property_inv_num').val(data[18]);
		$('#inv_num').val(data[19]);
		$('#last_year_inventoried').val(data[20]); // Changes
		$('div#material').show();
		$("div#material-form-container").scrollTop(0);
	});

	//Button object for adding material.
	//Displays modal form for adding material.
	$(document).on('click', '.add', function(){
		$("form#material").trigger("reset");
		$("#function").val("add");
		$(".modal-title").html("Add New Material");
		$("button#submitbtn").html("Add Material");
		$('div#material').show();
		$("div#material-form-container").scrollTop(0);
	});

	//Button object for adding another material.
	//Resets and display form for adding material.
	$(document).on('click', '#success-button', function(){
		if(function_name == "add"){
			$("form#material").trigger("reset");
		}
		$('div#success-notification').hide();
		$('div#material').show();
	});

	//Button object for filtering material table.
	//Displays filter options.
	$(document).on('click', '.filter', function(){
		$(".modal-title").html("Filter Materials");
		$("button#submitbtn").html("Update");
		$('div#filter').show();
	});

	//Button object for cancel button for material form.
	$(document).on('click', '#cancelbtn', function(){
		$("form#material").trigger("reset");
		$('div#material').hide();
		//Resets all formhandler design after a success/error input.
		$('div.form-control.error').removeClass('error'); // Changes
		$('div.form-control.success').removeClass('success'); // Changes
	});

	//Button object for submitting material form.
	$(document).on('click', '#submitbtn', function(){
		$('form#material').submit()
	});

	$(document).on('click', '.close', function(){
		$("form#material").trigger("reset");
		$('div#material').hide();
		$("form#filter-form").trigger("reset");
		$('div#filter').hide();
		//Resets all formhandler design after a success/error input.
		$('div.form-control.error').removeClass('error'); // Changes
		$('div.form-control.success').removeClass('success'); // Changes
	});

	//Button for updating table after setting a filter.
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
		$('i.sort-by-asc').hide();
		$('i.sort-by-desc').hide();
		if(sort_direction == 1){
			$(this).find('i.sort-by-asc').show();
		}
		else{
			$(this).find('i.sort-by-desc').show();
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
	$("form#search-form").submit(function(event){
		event.preventDefault();
		$("input#page-number").val(1);
		count();
	});
	$("form#material").submit(function(event){
		$('div.form-control.error').removeClass('error');// Change
		$('div.form-control.success').removeClass('success');// Change
		event.preventDefault();
		$(".input-invalid").hide();
		modifyMaterial();
	});
});
