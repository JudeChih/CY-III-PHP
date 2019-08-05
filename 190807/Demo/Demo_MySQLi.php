<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>PHP Sample</title>
</head>
<body>
	
<?php

/*===========================[01]建立連接===========================*/
$mysqli = new mysqli("localhost", "root", "", "class");
/* 檢查連接狀態 */
if (mysqli_connect_errno()) {
	printf("連接失敗： %s\n", mysqli_connect_error());
	exit();
}
/*===========================[02]執行查詢======================*/
$mysqli->query("SET NAMES 'utf8'");
$resultset = $mysqli->query("SELECT * FROM students");

/*===========================[03]處理結果======================*/
if ($resultset) {
	while($row = $resultset->fetch_assoc())
	{
		echo "ID：{$row['cID']}<br>";
		echo "Name：{$row['cName']}<br>";
		echo "<HR>";
	}
	/*=====================[04]關閉mysqli_result，清空所占記憶體=*/
	$resultset->close();
}

/*===========================[05]關閉連接，清空所占記憶體===============*/
$mysqli->close();

?>

</body>
</html>
