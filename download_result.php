<?php
header("Content-Type: application/octet-stream");


// $file = $_GET["file"] .".pdf";

$file = "src/uploaded/dental_clinic/lab_results/".$_GET['file'].".pdf";

$file_name = "LABRES-".$_GET['file'].'.pdf';

header("Content-Disposition: attachment; filename=" . $file_name);   
// header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 810);
    flush(); // this is essential for large downloads
} 
fclose($fp); 

?>