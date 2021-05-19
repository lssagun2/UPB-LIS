 <?php  
  require '../../config.php';

 if(isset($_POST["accnum_id"]))
 {  
    $id = $_POST['accnum_id'];
    $id = strval ($id);
    $sql = "SELECT * FROM MATERIAL 
    		WHERE mat_acc_num = '$id'";  
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
 }
 ?> 
