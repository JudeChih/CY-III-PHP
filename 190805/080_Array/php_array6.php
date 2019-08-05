<?php
header("content-type: text/html; charset=utf-8");

$season = array(
    'spring' => '春', 
    'summer' => '夏', 
    'autumn' => '秋', 
    'winter' => '冬'); 

echo "每年的四季分別為：<br>";
foreach ($season as $key => $value){
	echo $key, "=>", $value, "<br>";
}


?>