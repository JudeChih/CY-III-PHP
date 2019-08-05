<?php 
/*
use class;
create table employee
(
  firstName varchar(20), 
  lastName varchar(20), 
  EmpType varchar(20)
); 
*/

$dbh = new PDO("mysql:host=localhost;dbname=class", "root", "password");
$dbh->exec("SET CHARACTER SET utf8");

$sth = $dbh->prepare("insert into employee (firstName, lastName, EmpType) values (:fname, :lname, :etype)");
$firstName="myFirst";
$lastName="myLast";
$EmpType="myEmpType";
$sth->bindParam("fname", $firstName, PDO::PARAM_STR, 50);
$sth->bindParam("lname", $lastName, PDO::PARAM_STR, 50);
$sth->bindParam("etype", $EmpType, PDO::PARAM_STR, 50);
$sth->execute();

// 後續執行只要改變參數值即可
$firstName="myFirst2";
$lastName="myLast2";
$EmpType="myEmpType2";
$sth->execute();

echo "<br>-- Done --";
?>
