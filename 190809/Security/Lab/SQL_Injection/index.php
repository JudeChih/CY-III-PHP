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
			<h3>Hello! <?php echo $_COOKIE["userName"]; ?> </h3>
			<ol data-role="listview" data-inset="true">
				<li data-role="list-divider">Lab說明</li>
				<li>先點按 Login</li>
				<li>再試 Member 頁面</li>
			</ol>
		</div>

	</div>
	<!-- page -->

</body>
</html>
