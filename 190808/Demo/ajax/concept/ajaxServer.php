<?php
$result = "Hello! ";
if (isset($_GET["data"]))
  $result =  $result . $_GET["data"];
  
sleep(3);
echo $result;
?>