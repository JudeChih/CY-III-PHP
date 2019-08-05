<?php
  $x = getdate();
  echo gettype($x), "<br>";
  
  $x = date('Y-m-d H:i:s');
  echo $x, "<br>";
  echo gettype($x), "<br>";
  
  $x = gmdate('Y-m-d H:i:s');
  echo $x, "<br>";
  
  $x = strtotime(gmdate('Y-m-d H:i:s'));
  echo $x, "<br>";
  echo gettype($x), "<br>";
  
?>