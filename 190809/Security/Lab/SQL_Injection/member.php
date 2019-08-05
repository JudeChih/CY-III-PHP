<?php
require ("config.php");

if (! isset ( $_COOKIE ["userName"] )) {
	setcookie ( "lastPage", "member.php" );
	header ( "Location: login.php" );
	exit ();
}

$result = null;
if (isset ( $_POST ["btnOK"] )) {
	$min = $_POST ["txtMin"];
	$max = $_POST ["txtMax"];
	
	$db = new PDO ( "mysql:host=$dbhost;dbname=$dbname;port=3306", $dbuser, $dbpass );
	$db->exec ( "set names utf8" );
	$commandText = sprintf ( "select ProductID, ProductName, UnitPrice from Products where UnitPrice between %s and %s order by UnitPrice ", $min, $max );
	$result = $db->query ( $commandText );
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<?php require("script_css.php") ?>
</head>
<body>
	<div id="labPage" data-role="page" data-theme="d">
		
		<?php include("header.php"); ?>
			
		<div data-role="content">
			<form method="post" action="member.php">
				<label>Price range:</label>
				<div class="ui-grid-b">
					<div class="ui-block-a">
						<input type="text" name="txtMin" id="txtMin" value="0" />
					</div>
					<div class="ui-block-b">
						<input type="text" name="txtMax" id="txtMax" value="200" />
					</div>
					<div class="ui-block-c">
						<input type="submit" name="btnOK" value="OK" />
					</div>
				</div>
				
				<?php if (!$result): ?>
				<div>
					<ul data-role="listview" data-inset="true">
						<li data-role="list-divider">測試看看</li>
						<li>若是這麼輸入呢? 20 union select 123, 'abc', 123 --</li>
						<li>還是這樣: 20 union select 999, concat(ID, ':', Password), 999 from
							member --</li>
						<li>甚至這樣: 20; update products set unitPrice = 10 where productID =
							1; --</li>
					</ul>
				</div>
				<?php endif; ?>
				

				<div>
					<table id="resultTable" data-role="table" data-mode="columntoggle"
						class="table-stroke">
				<?php if ($result): ?>
						<tr>
							<th>編號
							
							</td>
							<th>產品名稱</th>
							<th>價格</th>
						</tr>
				<?php while ($row = $result->fetch ()): ?>
					<tr>
							<td><?php echo $row["ProductID"] ?></td>
							<td><?php echo $row["ProductName"] ?></td>
							<td><?php echo $row["UnitPrice"] ?></td>
						</tr>
				<?php endwhile; ?>
				<?php endif; ?>
				</table>
				</div>
			</form>
		</div>

	</div>
	<!-- page -->

</body>
</html>
