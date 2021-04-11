<?php
include('../Database/connect_db.php');
header("Content-Type: application/octet-stream");
$result=mysqli_query($conn,"SELECT * FROM journals WHERE id_team='$_GET[file]'");
$row=mysqli_fetch_assoc($result);
$file = "../Public/journal/".$row['file'];
header("Content-Disposition: attachment; filename=" . urlencode($file));   
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
flush(); // this doesn't really matter.
$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush(); // this is essential for large downloads
} 
fclose($fp); 