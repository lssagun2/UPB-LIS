<?php 
require '../../config.php';
session_start();
$staff_id = $_SESSION["staff_id"];

$sql3 = "DELETE FROM announcements WHERE `date_time` <= now() - interval 3 MINUTE";
$result3 = $conn->query($sql3);


$sql = "SELECT * FROM announcements ORDER BY date_time DESC";
// $sql = "SELECT * FROM announcements";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

  <li>
    <span class="text"><?php echo $row['text'];?> </br> </br> Posted By:
    	<?php 
    		$sql2 = "SELECT * FROM STAFF where staff_id = '{$row['staff_id']}'";
    		$result2 = $conn->query($sql2);
    		$row2 = $result2->fetch_assoc();
            if(empty($row2['staff_firstname'])){
                echo "Deleted Account";
            }
            else{
                echo $row2['staff_firstname']. " ".$row2['staff_lastname'];
            }
  			
    	 ?>
    	</br>
    	<?php 
    		echo "Time posted: ". $row['date_time'];

    	?>
    </span>

    <?php 
    	if(@$row2['staff_id'] === $staff_id){
    ?>
   		<i id="removeBtnAnnouncement" class="icon fa fa-trash" data-id="<?php echo $row['announce_id'];?>"></i>

    <?php 
		}
    ?>
  </li>



<?php
    }
} else {
    echo "<li><span class='text'>No announcements so far.</span></li>";
}


?>