
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
	
	$dbh->beginTransaction();

	// 第二個 Insert 無法執行, 欄位名稱錯了
	$dbh->exec("INSERT INTO employee (firstName, lastName,EmpType) VALUES ('myFirstZ','myLastZ','myEmpTypeZ')");
	$dbh->exec("INSERT INTO employee (firstNameX, lastName,EmpType) VALUES ('myFirst0','myLast0','myEmpType0')");
	//                                ^^^^^^^^^^^
	$dbh->commit();
	$dbh = NULL;
} catch (PDOException $err) {
	$dbh->rollback();
	echo "Error: " . $err->getMessage();
	exit();
}
?>
