<?php
    $directory = $_SERVER['DOCUMENT_ROOT']."/upb-lis/filters/";
    $file1 = fopen($directory . 'circ_type.txt', 'a');
    $file2 = fopen($directory . 'type.txt', 'a');
    $file3 = fopen($directory . 'status.txt', 'a');
    $file4 = fopen($directory . 'location.txt', 'a');
    flock($file1, LOCK_EX);
    flock($file2, LOCK_EX);
    flock($file3, LOCK_EX);
    flock($file4, LOCK_EX);
?>