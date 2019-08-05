<?php

for ($i = 1; $i <= 3; $i++) {
	for ($j = 1; $j <= 4; $j++) {
		echo "$i , $j <br>";
		if (($i + $j) % 4 == 0)
		    break;
	}
	echo "-----<br>";
}


?>