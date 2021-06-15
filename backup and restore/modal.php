<style>

.form-row {
  text-align: center;
  margin: auto;
}
.subtitle {
  margin: 25px;
}

#restore-modal .modalbtn {
  margin-bottom: 20px;
}

#restore-btn {
  margin-right: 20px;
}

.response {
  padding: 10px;
  margin-bottom: 20px;
    border-radius: 2px;
}

.error {
    background: #fbd3d3;
    border: #efc7c7 1px solid;
}

.success {
    background: #cdf3e6;
    border: #bee2d6 1px solid;
}

@media screen and (max-width: 1366px) {
  #restore-modal {
    height: 250px;
  }

  #restore .modal-content {
    height: 220px;
  }
}
</style>


<div class = "modal" id = "restore">

<?php
require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
date_default_timezone_set('Asia/Manila');
if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restore($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restore($filePath, $conn)
{
$mysqli = new mysqli("localhost", "root", "", "UPB_LIS");
$mysqli->query('SET foreign_key_checks = 0');
if ($result = $mysqli->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
    }
}

$mysqli->query('SET foreign_key_checks = 1');
    $sql = '';
    $error = '';

    if (file_exists($filePath)) {
        $lines = file($filePath);

        foreach ($lines as $line) {

            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            $sql .= $line;

            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach

        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
        exec('rm ' . $filePath);
    } // end if file exists

    return $response;
}
?>

  <span class = "close" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" method="post" action="" enctype="multipart/form-data" id="frm-restore">
    <div class = "container"  id = "restore-modal" style = "overflow-y: auto;">
      <h1 class = "modal-title"></h1>
        <div class="form-row">
            <div class = "subtitle" >Please select an appropriate .sql backup file</div>
                <input type="file" name="backup_file" class="input-file"/>
        </div>
        <button type = "submit" name="restore" value="Restore" class = "modalbtn" id = "restore-btn">Save changes</button>
        <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtn">Cancel</button>
    </div>
  </form>
</div>
