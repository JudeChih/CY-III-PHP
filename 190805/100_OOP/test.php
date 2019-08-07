<?php

echo 'start<hr>';
$obj = new Canimal;
echo 'use<hr>';
$obj->makeNoise();
echo $obj->height;
echo '<hr>';

$obj1 = new Cdog(1000,'taipei');
$obj1->makeNoise();
echo "<hr>";

echo $obj1->location;
echo "<hr>";
echo $obj1->height;

class Canimal{
    
    public $height = 30;

    function __construct($value = 0){ //建構程式
        echo 'contstruct<hr>';
        $this->height = $value;
    }

    function __destruct(){ //解構程式
        echo 'des-parent<hr>';
    }

    public function makeNoise(){
        echo "Animal:......<hr>";
    }
}

class Cdog extends Canimal{ //延伸類別
    public $location;
    function __construct($value,$loc){
        parent::__construct($value);//可以呼叫父層的function
        $this->location = $loc;
    }

    function __destruct(){ //解構程式
        echo 'des-now<hr>';
    }

    public function makeNoise(){
        $this->__construct(900,'taiwan');
        echo "Animal:NO~~~~~<hr>";
    }
}