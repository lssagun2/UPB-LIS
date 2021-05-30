$(document).ready(function(){
	$(document).on('click', '.backup', function(){
		console.log("Backing up....");

		$("div#loading-cover").show();
		$.ajax({
			type 		: 'POST',
			url			: '../backup and restore/functions/backup.php'
		})
		.done(function(data){	
			$("div#loading-cover").hide();
			alert("Database backed up successfully!");
		})
		.fail(function(data) {
			$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
		    });
		});
			$(document).on('click', '.restore', function(){
			$(".modal-title").html("Restore Database");
			$("button#restore-btn").html("Restore");
			$('div#restore').show();
		});
		//	$("#frm-restrore").submit(function(){
 		//	alert("Database restored successfully!");
		//});
 		/*	$(document).on('click', '#restore-btn', function(){
 			console.log("Restoring database....");
 			//$("#frm-restrore").submit();

 		$("div#loading-cover").show();
		$.ajax({
			type 		: 'POST',
			url			: '../backup and restore/functions/restore.php',
			datakey	    : $('#frm-restrore').serialize(),
			dataType    : "JSON"
		})
		.done(function(data){	
			$("div#loading-cover").hide();
			alert("Database restod successfully!");
		})
		.fail(function(data) {
			$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
		});
	});*/
});