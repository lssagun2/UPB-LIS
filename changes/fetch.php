 <?php  
  require '../config.php';

// Fetch additional material information to be passed to modal using mat_id
 if(isset($_POST["id"]))  
 {  
 	$id = $_POST['id'];
    $sql = "SELECT * FROM CHANGES AS c
            LEFT JOIN MATERIAL AS m ON c.mat_id=m.mat_id
            WHERE change_id = $id";  
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo json_encode($row);
 }
 ?> 
