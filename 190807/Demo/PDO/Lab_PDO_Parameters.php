
<!DOCTYPE HTML>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
<title>PHP Sample</title>
</head>
<body>
<?php
if (isset($_GET["id"]))
$id = $_GET["id"];
else
$id = 1;

$dbh = new PDO("mysql:host=localhost;dbname=class", "root", "password");
$dbh->exec("SET CHARACTER SET utf8");

$sth = $dbh->prepare("SELECT * FROM students WHERE cID=?");
$sth->bindValue(1, $id, PDO::PARAM_INT);

if (!$sth->execute())
{
	$info = $dbh->errorInfo();
	print_r($info);
}
else
{
	$row = $sth->fetch();
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
