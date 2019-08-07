<?php
	$contents = file_get_contents('data.txt');//將檔案裡面的內容變成字串
	echo (str_replace("\r\n", "<br />", $contents));
?>