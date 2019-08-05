<?php
require ("config.php");

if (isset ( $_GET ["logout"] )) {
	setcookie ( "userName", "Guest", time () - 3600 );
	header ( "Location: index.php" );
	exit ();
}

if (isset ( $_POST ["btnOK"] )) {
	$id = $_POST ["txtID"];
	$password = $_POST ["txtPassword"];
	$password = md5 ( $password );
	
	$db = new PDO ( "mysql:host=$dbhost;dbname=$dbname;port=3306", $dbuser, $dbpass );
	$db->exec ( "set names utf8" );
	$commandText = sprintf ( "select * from member where id = '%s' and password = '%s' ", $id, $password );
	$result = $db->query ( $commandText );
	$row = $result->fetch ();
	$db = null;
	
	if ($row) {
		setcookie ( "userName", $id );
		if (isset ( $_COOKIE ["lastPage"] ))
			header ( sprintf ( "Location: %s", $_COOKIE ["lastPage"] ) );
		else
			header ( "Location: index.php" );
		exit ();
	}
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
			<form method="post" action="login.php">
				<div data-role="fieldcontain">
					<label for="txtID">User ID:</label> <input type="text" name="txtID"
						id="txtID" value="" placeholder="請輸入帳號" />
				</div>
				<div data-role="fieldcontain">
					<label for="txtPassword">Password:</label> <input type="password"
						name="txtPassword" id="txtPassword" value="" />
				</div>

				<div class="ui-grid-a">
					<div class="ui-block-a">
						<input type="submit" name="btnOK" value="OK" />
					</div>
					<div class="ui-block-b">
						<a href="index.php" data-role="button">Cancel</a>
					</div>
				</div>
				<div>
					<ul data-role="listview" data-inset="true">
						<li data-role="list-divider">測試資料</li>
						<li>User ID: derek</li>
						<li>password: jeter</li>
						<li>若是在 User ID 輸入:「derek' -- comment」呢?</li>
					</ul>
				</div>
			</form>
		</div>

	</div>
	<!-- page -->

</body>
</html>
