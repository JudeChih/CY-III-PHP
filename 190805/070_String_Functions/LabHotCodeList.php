<?php
$e = '怪怪的';
$sData = "908872526535442041985072568716";
$result = "01234567890";
$iLen = strlen($sData);
for ($iPos = 0; $iPos < $iLen; $iPos++)
{
	$ch = substr($sData, $iPos, 1);
	echo $ch;
	echo "<hr>";
	$result = $ch . str_replace($ch, "", $result);

}
echo substr($result, 0, 5) . "-" . substr($result, 5, 5);

echo mb_substr($e,1,1);
?>