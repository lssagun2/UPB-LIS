<?php
    require $_SERVER['DOCUMENT_ROOT']."/upb-lis/config.php";
    $year = $_POST['year'];
    $sql = "
        SELECT COUNT(1) AS total,
            SUM(CASE WHEN inv_$year = 1 THEN 1 ELSE 0 END) AS inventoried,
            SUM(CASE WHEN inv_$year = 0 THEN 1 ELSE 0 END) AS not_inventoried
        FROM INVENTORY;
    ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo json_encode($row);
?>