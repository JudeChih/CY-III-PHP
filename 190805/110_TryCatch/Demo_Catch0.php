<?php

$x = 3;
$y = 0;
echo "test Flag 1<hr>";
$result = $x / $y; // Warning and go ahead.
echo "test Flag 2<hr>";
throw new Exception("Error!!");  // Fatal error and program stop
echo "test Flag 3<hr>";

?>

