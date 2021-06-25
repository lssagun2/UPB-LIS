//Script File for todolist functionality in dashboard.
$(document).ready(function(){
    //Fetch and display all task for particular user.
    function loadTasks(){
        $.ajax({
            url       : "functions/show-tasks.php",
            type      : "POST",
                  
            success: function(data){
                $('#tasks').html(data);
            }
        });
    }
    //Call initial tasks
    loadTasks();

    //Button object for adding task. 
    $('#addBtn').on('click', function(e){
        var task = $("#taskValue").val();
        //Process the inputs using a defined function for adding todolist
        $.ajax({
            url       : "functions/add-tasks.php",
            type      : "POST",
            data: {task: task},
            success: function(data){
                if(data == 1){          
                    $("#taskValue").val("");
                    alert("Your task has been added!");
                    loadTasks();  //Updates the list after a single process
                }
                else{
                    alert('Something went wrong')
                }
            }
        });
    });

    //Button object for removing task. 
    $(document).on('click', "#removeBtn", function(e){
          e.preventDefault();
          //Delete confirmation
          var ok = confirm("Are you sure you want to delete this?");
          if(ok){
              var id = $(this).data('id');
              //Process the inputs using a defined function for deleting todolist
              $.ajax({
                  url       : "functions/remove-task.php",
                  type      : "POST",
                  data      :{id: id},
                  success: function(data){
                      if(data == 1){          
                          loadTasks();  //Updates the list after a single process
                      }
                      else{
                          alert("Something went wrong! Try again later.")
                      }
                  }
              });
          } 
    });
           
           
});