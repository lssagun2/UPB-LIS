//Script File for updating staff table after performing functions.(adding/deleting/filtering).
$(document).ready(function(){
	update(); //initialize the staff table
});

//function that updates the contents of the tables
function update(){
	var data = $('form#active-form').serializeArray();
	$('div#loading-cover').show();
	//Process the inputs using a defined function for updating staff table.
	$.ajax({
		type 		: 'POST',
		url			: 'functions/update.php',
		data 		: $('form#active-form').serialize(),
		dataType 	: 'json'
	})
	.done(function(data){
		console.log(data);
		var body = $("tbody");
		body.empty();
		data.forEach(function(staff){
			if(staff.staff_active == 1){
				var button = "<button id = 'deleteStaff' class = 'edit'><i class='fas fa-trash-alt'></i></button>";
			}
			else{
				var button = "<button id = 'restoreStaff' class = 'edit'><i class='fas fa-redo'></i></button>";
			}
			//Appending column details inside staff table.
			body.append(
				"<tr align='center'>" +
					"<td style='display:none;'>" + staff.staff_id + "</td>" +
					"<td>" + staff.staff_username + "</td>" +
					"<td>" + staff.staff_firstname + "</td>" +
					"<td>" + staff.staff_lastname + "</td>" +
					"<td>" + staff.staff_password + "</td>" +
					"<td>" + staff.staff_type + "</td>" +
					"<td style = 'margin-right: 5px;' align = 'center'>" + 
                        "<button id = 'editStaffTable' class = 'edit'><i class = 'fas fa-edit'></i></button>" +
                        button +
                    "</td>" + 
				"</tr>"
			);
		});
		$('div#loading-cover').hide();
	})
	.fail(function(data) {
		$('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
    });
}