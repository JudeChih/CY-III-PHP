<?php
header("content-type:text/html; charset=utf-8");

// 請先建立 Class 資料庫 （執行 class.sql）

$db = new PDO("mysql:host=localhost;dbname=class;port=3306", "root", "password");
$db->exec("set names utf8");

@$db->exec("alter table students add cScore int;");
@$db->exec("update students set cScore = cID + 85;");

$db = null;

echo "<br />-- Done --";
?>
