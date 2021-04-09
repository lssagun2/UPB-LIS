<tr>
  <th width = "25%" style = "border-radius: 1em 0 0 0;">Accession Number</th>
  <th width = "25%">Barcode</th>
  <th width = "25%">Date of Inventory</th>
  <th width = "25%" style = "border-radius: 0 1em 0 0;">Inventoried by</th>
</tr>

<?php
  require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
  date_default_timezone_set('Asia/Manila');
  $year = date("Y");
  $sql = "SELECT mat_id, mat_acc_num, mat_barcode, date_$year, staff_id_$year FROM INVENTORY WHERE inv_$year = 1 ORDER BY date_$year DESC";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
?>
<tr>
  <td style="display:none;"><?php echo array_shift($row);?></td>
  <td><?php echo $row["mat_acc_num"]; ?></td>
  <td><?php echo $row["mat_barcode"]; ?></td>
  <td><?php echo $row["date_$year"]; ?></td>
<?php
  $id = $row["staff_id_$year"];
  $sql = "SELECT staff_firstname, staff_lastname FROM STAFF WHERE staff_id = '$id'";
  $list = $conn->query($sql);
  $staff = $list->fetch_assoc();

?>
  <td><?php echo $staff["staff_firstname"]." ".$staff["staff_lastname"]; ?></td>
</tr>
<?php } ?>
