<?php
function ShowStar($count,$what)
{
	$str = '';
	if($str = checkValue($count)){
		return $str;
	}
	for($i = 0 ; $i < $count ; $i++){
		$str .= $what;
	}
	return $str;
}

function checkValue($count){
	if($count <= 0){
		return '不能小於等於0';
	}
	if($count > 21){
		return '最多不能超過21位';
	}
	return false;
}


$rr = ShowStar(5,'$');
echo $rr;
?>