<?php
header("content-type: text/html; charset=utf-8");
 
$sData = "";
$f = fopen("data.txt", "r");// r 只能讀取  不能寫入
while (!feof($f))//一行一行的讀取內容
{
	$line = fgets($f);
	$sData .= Trim($line) . "<br>";
}
fclose($f);
echo $sData;

?>
