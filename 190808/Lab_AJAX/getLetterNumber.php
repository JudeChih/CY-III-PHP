<?php
$result = "";
if (!isset($_GET["letter"])) {
	die("no letter found.");
}
$letter = $_GET["letter"];

for ($i = 0; $i < 5; $i++) {
	$result .= sprintf("<option value='%s'>%s%s</option>", $i, $letter, $i+1); 
}

echo $result;
?>