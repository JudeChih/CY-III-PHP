<?php

$obj = new CAnimal();
$obj->makeNoise();
echo "<hr>";

// $obj->weight = 10;  // 如果是 $obj->weight = -10; 呢
// echo $obj->weight;

$obj->setWeight(10);
$obj->setWeight(-5);
echo $obj->getWeight();
// 這樣，資料正確了，不過，前一版的寫法比較直覺: $obj->weight = 10;
// 我們稍後再來解決這個問題。


class CAnimal
{
	
	// public $weight;
	private $_weight = 0;
	
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
