$(document).ready(function(){

$("form#announcementForm").submit(function(event){   
    event.preventDefault();
    console.log($('form#announcementForm').serialize())
    var function_name = $("input#function_announcement").val();
    $.ajax({
      type    : 'POST',
      url     : '../dashboard/functions/'+function_name+'.php',
      data    : $('form#announcementForm').serialize(),
      dataType  : 'json'
    })
    .done(function(data){
        $('div#announcementModal').hide();
        $('form#announcementForm').trigger("reset");
        if(function_name == "add-announcements"){
          alert("Your announcement has been posted!");
        }
        else{
          alert("Your announcement has been updated!");
        }
        
        loadAnnouncements();          
    })
    .fail(function(data) {
        //Server failed to respond - Show an error message
        $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
      });
  });


  //Show Tasks
  function loadAnnouncements(){
    $.ajax({
        url       : "functions/show-announcements.php",
        type      : "POST",

        success: function(data){
            $('#announcements').html(data);
        }
    });
  }
  loadAnnouncements();

  //Buttons
  //Add Announcement
  $('#addBtnAnnounce').on('click', function(e){
    $('div#announcementModal').show();
    $('input#function_announcement').val('add-announcements');
    $('button#postAnnouncementBtn').html('Post');
  });
  //Submit Announcement
  $('button#postAnnouncementBtn').on('click', function(e){
    $('form#announcementForm').submit();

  });
  //Cancel Button
  $('button#cancelbtnAnnouncement').on('click', function(e){
    $('form#announcementForm').trigger("reset");
  });
  //x Button
  $('span#closeModalAnnouncement').on('click', function(e){
    $('form#announcementForm').trigger("reset");
  });
  //Edit button
  $(document).on('click', "#editAnnouncement", function(e){
    var id = $(this).data('id');
    $('input#function_announcement').val('edit-announcements');
    $('input#announcement_id').val(id);
    $('button#postAnnouncementBtn').html('Update');
    console.log(id);
    $.ajax({
      type    : 'POST',
      url     : '../dashboard/functions/fetchContent.php',
      data    : {id:id},
      dataType  : 'json'
    })
    .done(function(data){
        $('#announcementTitle').val(data.title);
        $('#announcementContent').val(data.text);
        $('div#announcementModal').show();
    })
    .fail(function(data) {
        //Server failed to respond - Show an error message
        $('div').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
      });
  });
    //Expand announcement button
 $(document).on('click', "#expandAnnouncementButton", function(event){
    var id = $(this).data('id');
    console.log(id);
    $.ajax({
      type    : 'POST',
      url     : '../dashboard/functions/fetchContent.php',
      data    : {id:id},
      dataType  : 'json'
    })
    .done(function(data){
        console.log(data); 
        $('#announcementTitleModal').html(data.title);
        $('#announcementContentModal').html(data.text);
        $('#creator').html(data.staff_firstname + " " + data.staff_lastname);
        $('#time_posted').html(data.date_time);
    })
    .fail(function(data) {
        //Server failed to respond - Show an error message
        $('div').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
      });
    $('div#contentModal').show();
      
  });

  //Remove Announcement

  
  $(document).on('click', "#removeBtnAnnouncement", function(e){
      e.preventDefault();
      var ok = confirm("Are you sure you want to delete this?");

      if(ok){
          var id = $(this).data('id');
          $.ajax({
              url       : "functions/remove-announcements.php",
              type      : "POST",
              data      :{id: id},
              success: function(data){
                  if(data == 1){    
                      alert("Announcement has been deleted!")       
                      loadAnnouncements();
                  }
                  else{
                      alert("Something went wrong! Try again later.")
                  }
              }
          });
      } 
  });

});