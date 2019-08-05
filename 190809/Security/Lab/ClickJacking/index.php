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
				<li>再點按 Member 頁面</li>
			</ol>
			<hr>
			<a href="testIFrame.php" target="_blank" 
			   data-role="button">連往ClickJacking測試頁</a>
			<hr>
			<p>Note: 請留意 login.php 標頭 <em>X-Frame-Options: Deny</em>的效果</p>
			<p>Note: 請展示 login.php 的 <em>framebuster</em> 程式與效果。</p>
			  
		</div>

	</div>
	<!-- page -->

</body>
</html>
