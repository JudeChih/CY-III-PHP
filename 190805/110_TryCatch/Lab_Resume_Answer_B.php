<?php

// How to resume next when error occured?

$result = "";

for($i = 1; $i <= 9; $i++)
{
	try
	{
		foo($i);
	}
	catch (Exception $err)
	{
		continue;
	}
	 
}

echo $result;


function foo($i)
{
	//echo $i . "<br>";
	global $result;

	if ($i == 4)
	{
		$err = new Exception("An Error occured");
		throw $err;
	}

	$result .= "$i <br>";
}

?>
