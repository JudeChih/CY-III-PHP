<?php
header ( 'Access-Control-Allow-Origin: *' );
header ( 'Content-Encoding', 'chunked' );
header ( 'Transfer-Encoding', 'chunked' );
header ( 'Connection', 'keep-alive' );
echo " " . "\r\n";
ob_flush ();
flush ();

$response = array (
		"event" => "progress",
		"data" => 0 
);

for($i = 1; $i <= 10; $i ++) {
	sleep ( rand ( 1, 3 ) );
	$response ["data"] = $i * 10;
	echo json_encode ( $response ) . "\r\n";
	ob_flush ();
	flush ();
}

?>