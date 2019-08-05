<?php

$pdo = new PDO("mysql:host=127.0.0.1;dbname=northwind", 'root', '');

try {
	$pdo->beginTransaction();

	$pdo->exec("update Products set UnitPrice = 15 where ProductID = 1");
	if ($pdo->errorCode() != '00000')
		throw new Exception("test test test");
	$pdo->exec("update Productsssssss set UnitPrice = 13 where ProductID = 2");
	if ($pdo->errorCode() != '00000')
		throw new Exception("test test test");
	
	$pdo->commit();
}
catch (Exception $err) {
	$pdo->rollBack();
	var_dump($pdo->errorInfo());
	// error log -> log file
}

echo '--done--';

