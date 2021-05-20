$(document).ready(function(){
	$(document).on('click', '.filter', function(){
		$(".modal-title").html("Filter Materials");
		$("button#submitbtn").html("Update");
		$('div#filter').show();
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
	$(document).on('click', 'a.category', function(){
		category = $(this).data('category');
		if(category == "inventoried"){
			$('.inventoried-column').show();
		}
		else{
			$('.inventoried-column').hide();
		}
		count();
		$('#table-materials').show();

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
