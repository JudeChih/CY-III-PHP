<?php

$a = array('a1', 'a3', 'a20', 'a15');

natsort($a);

//var_dump(natsort($a));
//echo "<br>";

foreach ($a as $k => $x)
{
	echo "$k => $x <br>";
}

?>
