function formhandler(record_data){
	console.log(record_data);

	$.ajax({
		type 		: 'POST',
		url			: 'functions/record.php',
		data 		: record_data,
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		$('form.materiala').trigger("reset");
		$('form.materialb').trigger("reset");
		update();
	})
	.fail(function(data) {
      //Server failed to respond - Show an error message
      $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}

$(document).ready(function(){
	$(document).on('click', '#anbtn', function(event) { //Open Accession Modal Button
	      $('div#id01').show()
	    });
	    
	    $(document).on('click', '#bsbtn', function(event) { // Open Barcode Modal Button
	      $('div#id02').show()
	    });

	    $(document).on('click', '.close', function() { // Close Modals
	      $('div#id01').hide();
	      $('div#id02').hide();
	    });
		$(document).on('click', '#submitbtna', function(){ // Submit Data - Accession Number
			var record_data = $('form.materiala').serialize();
			formhandler(record_data);
		});
		$(document).on('click', '#submitbtnb', function(){ // Submit Data - Barcode
			var record_data = $('form.materialb').serialize();
			formhandler(record_data);
		});
	   $(document).on('click', '#submit_acc_num', function(event) { // Fetch Accession Number Modal Data
	    var accnum_id = $('#input_acc_num').val();

	    $.ajax({
	      type      : 'POST',
	      url       : 'functions/fetcha.php',
	      data      : {accnum_id:accnum_id},
	      dataType  : 'JSON'
	    })
	    .done(function(data){
	    	  $('#ida').val(data.mat_id);
	          $('#acc_numa').val(data.mat_acc_num);
	          $('#barcodea').val(data.mat_barcode);
	          $('#call_numbera').val(data.mat_call_num);
	          $('#titlea').val(data.mat_title);
	          $('#authora').val(data.mat_author)
	          $('#volumea').val(data.mat_volume);
	          $('#yeara').val(data.mat_year);
	          $('#editiona').val(data.mat_edition);
	          $('#publishera').val(data.mat_publisher);
	          $('#pub_yeara').val(data.mat_pub_year);
	          $('#circ_typea').val(data.mat_circ_type)
	          $('#typea').val(data.mat_type);
	          $('#statusa').val(data.mat_status);
	          $('#sourcea').val(data.mat_source);
	          $('#locationa').val(data.mat_location);
	    })
	    .fail(function(data) {
	        //Server failed to respond - Show an error message
	        $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
	    }); 
	  });
	  $(document).on('click', '#submit_bar', function() { // Fetch Barcode Modal Data
	    var bar = $('#input_barcode').val();

	    $.ajax({
	      type      : 'POST',
	      url       : 'functions/fetchb.php',
	      data      : {bar:bar},
	      dataType  : 'JSON'
	    })
	    .done(function(data){
	    	  $('#idb').val(data.mat_id);
	          $('#acc_numb').val(data.mat_acc_num);
	          $('#barcodeb').val(data.mat_barcode);
	          $('#call_numberb').val(data.mat_call_num);
	          $('#titleb').val(data.mat_title);
	          $('#authorb').val(data.mat_author)
	          $('#volumeb').val(data.mat_volume);
	          $('#yearb').val(data.mat_year);
	          $('#editionb').val(data.mat_edition);
	          $('#publisherb').val(data.mat_publisher);
	          $('#pub_yearb').val(data.mat_pub_year);
	          $('#circ_typeb').val(data.mat_circ_type)
	          $('#typeb').val(data.mat_type);
	          $('#statusb').val(data.mat_status);
	          $('#sourceb').val(data.mat_source);
	          $('#locationb').val(data.mat_location);
	    })
	    .fail(function(data) {
	        //Server failed to respond - Show an error message
	        $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
	    });

	});
});