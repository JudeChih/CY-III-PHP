<?php

class CAnimal
{
	private $_location;
	public $weight;
	public function setLocation($value) {
		$this->_location = $value;
	}
}

class CDog extends CAnimal {
	public $price;
}

$objDog = new CDog();
$objDog->weight = 10;
$objDog->price = 20000;
$objDog->setLocation("Taiwan");

$json = json_encode($objDog);
echo $json, "<br>";

// $arrayData = [1, 2, ['A', 'B', 'C'], 4, 5];
$arrayData = Array(1, 2, Array('A', 'B', 'C'), 4, 5);
$arrayJson = json_encode($arrayData);
// $arrayJson = json_encode($arrayData, JSON_FORCE_OBJECT);
echo $arrayJson, "<br>";

$obj = json_decode($json);
echo $obj->price, "<br>";
// $obj = json_decode($json, true);
// echo $obj["price"], "<br>";
var_dump($obj);


?>
