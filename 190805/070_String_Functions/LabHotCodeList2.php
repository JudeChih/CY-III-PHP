<?php
$f = fopen("pick3.txt", "r");
while (!feof($f))
{
	$line = fgets($f);
	echo "$line<br>";
}
fclose($f);
echo "--End--";
?>