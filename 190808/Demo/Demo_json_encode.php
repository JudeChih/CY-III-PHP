<?php 

header("content-type:text/html; charset=utf-8");

// 0. 請先建立 Class 資料庫 （執行 class.sql）

// 1. 連接資料庫伺服器
$link = mysql_connect("127.0.0.1", "root", 'Pa$$w0rd') or die(mysql_error());

$result = mysql_query("set names utf8", $link);
mysql_select_db("class", $link);

// 2. 執行 SQL 敘述
$commandText = "select * from students";
$result = mysql_query($commandText, $link);

// $row = mysql_fetch_assoc($result);
// $row = mysql_fetch_row($result);
// $row = mysql_fetch_array($result);

$row = mysql_fetch_assoc($result);

$json = json_encode($row);

echo $json;
// var_dump($row);

?>