<?php

$obj = new CAnimal(3);
echo "weight: ", $obj->getWeight(), "<br>";
//$obj2 = $obj;
//echo "flag 1<br>";
$obj = null;
//echo "flag 2<br>";


class CAnimal
{
	// public $weight;
	private $_weight = 0;

	function __construct($weightValue = 0) {
		echo "Object Created.<br>";
		$this->setWeight($weightValue);
		// 還是寫成這樣: (哪一個比較好? @@" )
		// $this->_weight = $weightValue;
	}
	
	function __destruct() {
		echo "Object destroyed.";
	}
	
	public function makeNoise()
	{
		echo "CAnimal: makeNoise";
	}
	
	public function setWeight($value)
	{
		if ($value >= 0)
			$this->_weight = $value;
	}
	
	public function getWeight()
	{
		return $this->_weight;
	}
	
}

?>
