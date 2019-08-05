<?php

$filename = fopen("log.txt", "a+");
fwrite($filename, date('Y-m-d H:i:s') . "\r\n");
fwrite($filename, "----------\r\n");
fclose($filename);

// $headers = apache_request_headers();
$headers = getallheaders();
$origin = $headers["Origin"];
if ( !strpos($origin, "c9") )
	die("I don't know you.");

header("Access-Control-Allow-Origin: $origin");
$curDate = date('Y-m-d H:i:s');
echo '{"time": "' . $curDate . '"}';

?>
