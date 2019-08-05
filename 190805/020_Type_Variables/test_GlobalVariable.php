<?php
$a = 20;
function myfunction($b) {
	//print "a=$a<br>";
	$a = 30;
	//print "a=$a<br>";
	global $a, $c;
	//print "a=$a<br>";
	return $c = ($b + $a);
}
print myfunction(40) + $c;
?>