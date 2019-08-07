<?php
header("content-type: text/html; charset=utf-8");

$season = array(
    'spring' => '春', 
    'summer' => '夏', 
    'autumn' => '秋', 
    'winter' => '冬'); 
    
print_r($season);
echo "<hr>";
var_dump($season); //會顯示陣列的長度或是字串的長度
?>