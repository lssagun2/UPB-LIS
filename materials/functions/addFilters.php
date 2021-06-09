<?php
    $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/filters/";
    $data = [];
    $filters = [
        'circ_type' => $_POST['circ_type'],
        'type' => $_POST['type'],
        'status' => $_POST['status'],
        'location' => $_POST['location']
    ];
    foreach($filters as $column => $filter){
        $file = fopen($directory . $column . '.txt', 'a');
        if (flock($file, LOCK_EX)) {  // acquire an exclusive lock
            fwrite($file, $filter . "\n");
            fflush($file);            // flush output before releasing the lock
            flock($file, LOCK_UN);    // release the lock
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
        fclose($file);
    }
    echo json_encode($data);

?>