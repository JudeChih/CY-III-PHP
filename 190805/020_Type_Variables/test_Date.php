<?php
  $x = getdate(); //得到是一個日期的陣列
  echo gettype($x), "<br>";
  
  $x = date('Y-m-d H:i:s'); //得到是一個日期的字串
  echo $x, "<br>";
  echo gettype($x), "<br>";
  
  $x = gmdate('Y-m-d H:i:s'); //格林威治時間
  echo $x, "<br>";
  
  $x = strtotime(gmdate('Y-m-d H:i:s'));
  echo $x, "<br>";
  echo gettype($x), "<br>";
  
?>