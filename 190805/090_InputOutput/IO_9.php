<?php
header("Content-Type: image/png");

$filename = "cc.png";
$fileHandle = fopen($filename, "rb");
echo fread($fileHandle, filesize($filename));
fclose($filename);

?>