 <?php  
  require '../../config.php';

 if(isset($_POST["bar"]))  
 {  
    $id = $_POST['bar'];
    $sql = "SELECT * FROM MATERIAL AS m WHERE m.mat_barcode = '$id'";  
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
 }
 ?> 
