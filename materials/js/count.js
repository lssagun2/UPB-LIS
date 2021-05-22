//function that counts the total number of materials with the current filter
function count(){
	$('div#loading-cover').show();
	$.ajax({
		type 		: 'POST',
		url			: 'functions/count.php',
		data 		: $('form#filter-form').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		material_count = data;	//stores the number of materials to the global variable material_count
		$("span#total-materials").html(material_count);
		$("input#page-number").val(1);	//resets the page number to 1
		update();	//updates the display for the table
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}