<?php
	$contents = file_get_contents('data.txt');
	echo (str_replace("\r\n", "<br />", $contents));
?>