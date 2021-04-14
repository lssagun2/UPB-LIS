<?php
	require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
?>

<tr>
  <th style = "border-radius: 1em 0 0 0;">Accession Number</th>
  <th>Barcode</th>
  <th>Call Number</th>
  <th>Title</th>
  <th>Author</th>
  <th>Volume</th>
  <th>Year</th>
  <th>Edition</th>
  <th>Publisher</th>
  <th>Publication Year</th>
  <th>Circulation Type</th>
  <th>Type</th>
  <th>Status</th>
  <th>Source</th>
  <th>Last Year Inventoried</th>
  <th style = "border-radius: 0 1em 0 0;">Action</th>
</tr>

<?php
  $sql = "SELECT * FROM MATERIAL";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
 ?>

<tr align="center">
  <td style="display:none;"><?php echo array_shift($row);?></td>
  <?php
    foreach($row as $column=>$value){
      echo "<td>$value</td>";
    }
  ?>
  <td>
    <button class = "edit" style = "width: 50px; height: 50px; color: #000;"><i class = "fas fa-edit"></i></button>
  </td>
</tr>
<?php } ?>
