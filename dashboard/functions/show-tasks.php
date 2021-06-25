<?php 
//Function for deleting a specific announcement.
require '../../config.php';
session_start();
$staff_id = $_SESSION["staff_id"];

//Automatically deletes tasks that has been posted for 30 days.
$sql2 = "DELETE FROM todos WHERE `date_time` <= now() - interval 30 DAYS";
$result2 = $conn->query($sql2);

$sql = "SELECT * FROM todos where staff_id = $staff_id ORDER BY date_time DESC";
$result = $conn->query($sql);
//Append all fetched tasks inside div dedicated for todolist.
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
<li>
    <span class="text"><?php echo $row['title']; ?></span>
    <i id="removeBtn" class="icon fa fa-trash" data-id="<?php echo $row['todo_id']; ?>"></i>
  </li>
<?php
    }
    echo '<div class="pending-text">You have ' . $result->num_rows . ' pending tasks.</div>';
} else {
    echo "<li><span class='text'>No Records Found.</span></li>";
}
?>