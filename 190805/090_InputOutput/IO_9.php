<?php
header("Content-Type: image/png");

$filename = "cc.png";
$fileHandle = fopen($filename, "r"); //二元檔案
echo fread($fileHandle, filesize($filename));
fclose($filename);

?>