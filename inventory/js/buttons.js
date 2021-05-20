$(document).ready(function(){
	$(document).on('click', 'button#rgbtn', function(){
		$('div#report').show();
	});
  $(document).on('change', 'select#report-select', function(){
    console.log($(this).val());
    if($(this).val() == 'comparison') {
      $('div.year-select').show();
    }
    else{
      $('div.year-select').hide();
    }
	});
});
