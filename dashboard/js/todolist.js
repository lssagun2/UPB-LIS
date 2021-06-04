$(document).ready(function(){
            //Show Tasks
    function loadTasks(){
        $.ajax({
            url       : "functions/show-tasks.php",
            type      : "POST",
                  
            success: function(data){
                $('#tasks').html(data);
            }
        });
    }
    
    loadTasks();
    //Add Tasks

    $('#addBtn').on('click', function(e){
        var task = $("#taskValue").val();
        $.ajax({
            url       : "functions/add-tasks.php",
            type      : "POST",
            data: {task: task},
            success: function(data){
                if(data == 1){          
                    $("#taskValue").val("");
                    loadTasks();
                }
                else{
                    alert('Something went wrong')
                }
            }
        });
    });

    $(document).on('click', "#removeBtn", function(e){
          e.preventDefault();
          var ok = confirm("Are you sure you want to delete this?");

          if(ok){
              var id = $(this).data('id');
              
              $.ajax({
                  url       : "functions/remove-task.php",
                  type      : "POST",
                  data      :{id: id},
                  success: function(data){
                      if(data == 1){          
                          loadTasks();
                      }
                      else{
                          alert("Something went wrong! Try again later.")
                      }
                  }
              });
          } 
    });
           
           
});