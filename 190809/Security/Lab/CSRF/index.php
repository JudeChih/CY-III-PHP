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
		<!-- http://www.monster.com/Lab/CSRF/badPage.php -->
		<div data-role="content">
			<h3>Hello! <?php echo $_COOKIE["userName"]; ?> </h3>
			<ol data-role="listview" data-inset="true">
				<li data-role="list-divider">Lab說明</li>
				<li>修改網址 www.beauty.com</li>
				<li>點按 Login登入系統</li>
				<li>執行「間接」轉帳程序<br>http://www.monster.com/Lab/CSRF/badPage.php</li>
				<li>檢視 c:\temp\tranferLog.txt 轉帳記錄</li>
				<li>badPage.php 應用 Content-Security-Policy 轉變為 goodPage </li>
			</ol>
		</div>

	</div>
	<!-- page -->

</body>
</html>
