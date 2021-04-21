<?php

include_once 'Excel.php';

/**
 * Example to extend functionality of the excel class
 */
$file_name='example.xls';

$excel=new Excel($file_name);
/**
 * set required data
 */
$header=['column 1','column 2','column 3'];
$data=[
    [
        'value 11','value 21','value 31'
    ],
    [
        'value 12','value 22','value 32'
    ]
];
$excel->clear();
$excel->writeExcel($header,$data);
$excel->downloadExcel();
$excel->deleteFile();