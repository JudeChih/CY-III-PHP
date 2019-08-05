<?php

class CTest
{
	public $AProp = 10;

	private $_test;
	
	public function __set($varName, $varValue)
	{
		echo "__set<br>";
		echo $varName, ": ", $varValue, "<br>";
		$this->_test[$varName] = $varValue;
	}

	public function __get($varName)
	{
		echo "__get<br>";
		echo $varName, "<br>";
		return $this->_test[$varName];
	}

	
}

$obj = new CTest();
echo "AProp = $obj->AProp <br>";

echo "<hr>";

$obj->Name = "Chien";
echo "Name = $obj->Name <br>";

?>