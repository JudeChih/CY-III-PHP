<?php

if (! isset ( $_COOKIE ["userName"] )) {
	setcookie ( "lastPage", "member.php" );
	header ( "Location: login.php" );
	exit ();
}

$fromID = $_GET["fromID"];
$toID = $_GET["toID"];
$money = $_GET["money"];

$line = sprintf("Form: %s, To: %s, Money: %s \r\n", $fromID, $toID, $money);

$filename = fopen("c:\\temp\\transferLog.txt", "a+");
fwrite($filename, date('Y-m-d H:i:s') . "\r\n");
fwrite($filename, $line);
fwrite($filename, "----------\r\n");
fclose($filename);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
</head>
<body>
<p>transfer OK!</p>
</body>
</html>
