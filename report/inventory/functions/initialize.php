<?php
    require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
    $year = $_POST['year'];
    $prev_year = $year - 1;
    $sql = "SHOW COLUMNS FROM INVENTORY LIKE 'inv_$prev_year'";
    $result = $conn->query($sql);
    $new_acquired = "";
    if($result->num_rows != 0){
        $new_acquired = "SUM(CASE WHEN inv_$prev_year = -1 AND inv_$year != -1 THEN 1 ELSE 0 END) AS new_acquired,";
    }
    $sql = "
        SELECT COUNT(1) AS total,
            SUM(CASE WHEN inv_$year = 1 THEN 1 ELSE 0 END) AS inventoried,
            SUM(CASE WHEN inv_$year = 0 THEN 1 ELSE 0 END) AS not_inventoried,
            $new_acquired
            SUM(CASE WHEN inv_$year = -1 THEN 1 ELSE 0 END) AS not_acquired
        FROM INVENTORY;
    ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
?>