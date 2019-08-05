<?php

// How to resume next when error occured?

$result = "";

for($i = 1; $i <= 9; $i++)
{
	$rtn = foo($i);
	if (!$rtn)
	{
		// ...
	    if (!foo($i))  // try it again.
	       continue;
	}
}

echo $result;


function foo($i)
{
	//echo $i . "<br>";
	global $result;
	$returnValue = true;

	try
	{
		if ($i == 4)
		{
			$err = new Exception("An Error occured");
			throw $err;
		}

		$result .= "$i <br>";
	}
	catch (Exception $err)
	{
		 $returnValue = false;
	}
	return $returnValue;
	
}

?>
