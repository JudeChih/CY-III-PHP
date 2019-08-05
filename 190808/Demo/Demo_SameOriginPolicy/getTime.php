<?php
// header("Access-Control-Allow-Origin: *");

$curDate = date('Y-m-d H:i:s');
echo '{"time": "' . $curDate . '"}';
?>
