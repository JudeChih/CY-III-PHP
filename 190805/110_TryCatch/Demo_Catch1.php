<?php

$x = 3;
$y = 0;
try
{
	echo "test Flag 1<hr>";
	$result = $x / $y; // Warning and go ahead.
	echo "test Flag 2<hr>";
	throw new Exception("Error!!");  // Fatal error and program stop
}
catch (Exception $err)
{
	echo "trap into CATCH block.<hr>";
	echo $err->getMessage() . "<hr>";
}
echo "test Flag 3";

?>

