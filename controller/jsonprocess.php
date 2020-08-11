<?php

    // Write the data into json file
    $file = fopen("../include/myJsonTestFile.json", 'w'); 
    $text = "Hello world again\n"; 
    fwrite($file, $text);
    fclose($file);

    // Read the data from json file and return it as tree
    $filename = "../include/myJsonTestFile.json"; 
    $file1 = fopen( $filename, 'r' ); 
    $size = filesize( $filename ); 
    $filedata = fread( $file1, $size );
    fclose($file1);
    echo $filedata;

?>