<?php

$filename = fopen("log.txt", "a+");
fwrite($filename, date('Y-m-d H:i:s') . "\r\n");
fwrite($filename, "----------\r\n");
fclose($filename);

// $headers = apache_request_headers();
$headers = getallheaders(); //讀取檔頭所有內容  會得到一個陣列  找到origin就可以抓到訪客內容
$origin = $headers["Origin"];
if ( !strpos($origin, "c9") )
	die("I don't know you.");

header("Access-Control-Allow-Origin: $origin");
$curDate = date('Y-m-d H:i:s');
echo '{"time": "' . $curDate . '"}';

?>
