$(document).ready(function(){
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

  //Add Announcement

  $('#addBtnAnnounce').on('click', function(e){
    var announcement = $("#announcementValue").val();
    $.ajax({
        url       : "functions/add-announcements.php",
        type      : "POST",
        data: {announcement: announcement},


        success: function(data){  
            if(data == 1){          
                $("#announcementValue").val("");
                loadAnnouncements();
            }
            else{
                alert('Something went wrong')
            }
        }
    });
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