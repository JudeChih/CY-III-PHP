<?php
$n = 3;

$b = 4 - strlen($n);
$str = '';
for($i = 0 ; $i < $b ; $i++){
    $str .= '0';
}

echo $str . $n;
echo "<hr>";
echo substr($n + 10000 , 1,4);