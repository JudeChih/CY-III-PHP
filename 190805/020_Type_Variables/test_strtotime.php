<?php
  $d = strtotime("2012-09-10");
  // $d = strtotime("2012-09-10 -3 days");
  // $d = strtotime("2012-09-10 +1 month");
  echo $d;
  echo "<br>";
  echo date("Y-m-d", $d);
?>
