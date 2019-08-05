<?php 
  $nWeek = date("w");
  $sWeekdays = array("日", "一", "二", "三", "四", "五", "六");
  $sWeek = $sWeekdays[$nWeek];
?>

<html>
<head>
<title>Lab</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>今天是星期<?php echo $sWeek ?></h1>
<hr>
<img src="Fruit<?php echo $nWeek ?>.gif" />
</body>
</html>
