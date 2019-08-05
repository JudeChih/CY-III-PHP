
<?php
/*
 use class;
 drop table employee;
 create table employee
 (
   firstName varchar(20),
   lastName varchar(20),
   EmpType varchar(20)
 ) engine = InnoDB;
 */
try
{
	$dbh = new PDO("mysql:host=localhost;dbname=class",
                    "root", "password");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->exec("SET CHARACTER SET utf8");

	// 第二個 Insert 無法執行, 欄位名稱錯了
	$dbh->exec("INSERT INTO employee (firstName, lastName,EmpType) VALUES ('myFirstX','myLastX','myEmpTypeX')");
	$dbh->exec("INSERT INTO employee (firstNameX, lastName,EmpType) VALUES ('myFirstY','myLastY','myEmpTypeY')");
	//                                 ^^^^^^^^^^^
	$dbh = NULL;
} catch (PDOException $err) {
	echo "Error: " . $err->getMessage();
	exit();
}
?>
