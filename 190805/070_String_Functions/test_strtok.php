<?php
$showStr = "Genius is|one/percent inspiration and ninety-nine percent perspiration.";
$s = strtok($showStr, " ");
while ($s != "")
{
   echo $s. "*" . "<br>";
   $s = strtok(" .|/");
   
   
   // 如果這麼寫，程式會沒完沒了...
   // $s = strtok($showStr, " ");
}
?>