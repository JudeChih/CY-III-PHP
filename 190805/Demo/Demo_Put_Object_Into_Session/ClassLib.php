<?php

class CAnimal
{
	// public $weight;
	private $_weight = 0;

	function __construct($weightValue = 0) {
		echo "Object Created.<br>";
		$this->setWeight($weightValue);
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

class CDog extends CAnimal {
	private $_price = 0;

	function __construct($weightValue = 0, $priceValue = 0) {
		parent::__construct($weightValue);
		$this->setPrice($priceValue);
	}

	public function makeNoise()
	{
		parent::makeNoise();
		echo "<br>";
		echo "Dog: Bark!<br>";
	}

	public function setPrice($value)
	{
		if ($value >= 0)
			$this->_price = $value;
	}

	public function getPrice()
	{
		return $this->_price;
	}

}

?>