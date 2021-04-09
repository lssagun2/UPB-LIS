<?php 
require '../config.php';

 ?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>STAFF</title>
  </head>
  <body>



    <!-------------------- EDIT POP UP FORM (BOOTSTRAP FORM) --------------->
    <div class="modal fade" id="editstaffmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDIT STAFF DATA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <form action="tools/edit/edit.php" method="POST">
          <div class="modal-body">
                <input type="hidden" name="table" value = "STAFF">
                        <div class="mb-3">
                                <label class="form-label">Staff ID</label>
                                <input type="text" readonly="" class="form-control" name="primarykey" id="primarykey">
                                
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="staffusername" id="staffusername" placeholder = "Enter Username">
                                
                        </div>
                        <div class="mb-3">
                                <label  class="form-label">First Name</label>
                                <input type="text" class="form-control" name="stafffirstname" id="stafffirstname" placeholder = "Enter First Name" >
                        </div>
                        <div class="mb-3">
                                <label  class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="stafflastname" id="stafflastname" placeholder = "Enter Last Name">
                        </div>
                        <div class="mb-3">
                                <label  class="form-label">Password</label>
                                <input type="password" class="form-control" name="staffpassword" id="staffpassword" placeholder = "Enter Password">
                        </div>
                    
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="editdata" class="btn btn-primary">Save changes</button>
          </div>
         </form>
        </div>
      </div>
    </div>

    <!-------------------- EDIT POP UP FORM --------------->



    <div class="container mt-5">
        <div class = "row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            <h4>STAFF.</h4>
                    </div>
                    <div class="card-body">
                        <table class = "table">
                            <thead>
                                <tr>
                                    <th>staff_ID</th>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Password</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="studentdata">
                                <?php 
                                    $sql = "SELECT * from STAFF";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                 ?>
                                <tr>
                                    <td><?php echo $row["staff_id"] ?></td>
                                    <td><?php echo $row["staff_username"]   ?></td>
                                    <td><?php echo $row["staff_firstname"]  ?></td>
                                    <td><?php echo $row["staff_lastname"]   ?></td>
                                    <td><?php echo $row["staff_password"]   ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success editbtn" name="editstaff">EDIT</button>
                                    </td>
                                    
                                </tr>
                                    <?php   
                                        }
                                     ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    

    <!-- JS Script -->
    <script>
        $(document).ready(function(){
            $('.editbtn').on('click', function(){

                $('#editstaffmodal').modal('show');

                $tr = $(this).closest('tr');
                // critical bootstrap method, takes the value of td and put in the input tags
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#primarykey').val(data[0])
                $('#staffusername').val(data[1]);
                $('#stafffirstname').val(data[2]);
                $('#stafflastname').val(data[3]);
                $('#staffpassword').val(data[4]);
            }); 
        });

    </script>












  </body>
</html>