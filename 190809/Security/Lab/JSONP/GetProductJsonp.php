<?php
if (! isset ( $_GET ["id"] ))
	die ( "Parameter id not found." );

$id = $_GET ["id"];
if (! is_numeric ( $id ))
	die ( "id not a number." );

$cb = $_GET ["callback"];


require ("config.php");
$link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
mysql_selectdb ( $dbname, $link );
$commandText = <<<SqlQuery
select ProductID, ProductName, UnitsInStock  
  from products
  where ProductID = $id
SqlQuery;

$result = mysql_query ( $commandText, $link );
$row = mysql_fetch_assoc ( $result );

echo $cb . "(" . json_encode($row) . ");";

mysql_free_result ( $result );
mysql_close ( $link );
?>
