<!DOCTYPE HTML>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
<title>PHP Sample</title>
</head>
<body>
<?php
$dbh = new PDO("mysql:host=localhost;dbname=class", "root", "password");
$dbh->exec("SET CHARACTER SET utf8");
if (isset($_GET["id"]))
  $id = $_GET["id"];
else
  $id = 1;
// 想想看, 如果這樣輸入呢：
// http://localhost/Day5/Lab_PDO_SQL_Injection.php?id=1; update students set cScore = 100 where cID = 2;
$sql = "SELECT * FROM students WHERE cID =" . $id;
if (!$result = $dbh->query($sql))
{
	// 顯示錯誤資訊
	$info = $dbh->errorInfo();
	print_r($info);
}
else
{
	// 讀入一筆
	$row = $result->fetch();
	// 寫出資料
	if(!empty($row))
	{
		echo "id：" . $row["cID"] . "<br>";
		echo "名字：" . $row["cName"] . "<br>";
	}
}

$dbh = NULL;
?>

</body>
</html>
