<?php
//Function for deleting a specific announcement.
require '../../config.php';
session_start();
$staff_id = $_SESSION["staff_id"];

//Automatically deletes announcement that has been posted for 30 days.
$sql3 = "DELETE FROM announcements WHERE `date_time` <= now() - interval 30 DAYS";
$result3 = $conn->query($sql3);

//Fetch all announcements.
$sql = "SELECT * FROM announcements ORDER BY date_time DESC";
$result = $conn->query($sql);
//Append all fetched announcement inside div dedicated for announcement lists.
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
  <li>
    <span class="text">
        <b><?php echo $row['title'];?></b>
        </br>
        <button id="expandAnnouncementButton" data-id="<?php echo $row['announce_id'];?>"><i class="fas fa-scroll"></i> See More
        </button>
        </br> Posted By:
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

        <br>
    </span>

    <?php
    	if(@$row2['staff_id'] === $staff_id){
    ?>
      <!--Assign data-id inside delete button for fetching purposes-->
      <i id="removeBtnAnnouncement" data-id="<?php echo $row['announce_id'];?>"><i class="icon fa fa-trash"></i></i>
   	  <i id="editAnnouncement" data-id="<?php echo $row['announce_id'];?>"><i class="icon2 fas fa-edit"></i></i>

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
