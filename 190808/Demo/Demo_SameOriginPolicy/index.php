<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<?php require("script_css.php") ?>
</head>
<body>
	<div id="labPage" data-role="page" data-theme="d">
		<div data-role="header">
			<h3>Lab</h3>
		</div>
		
		<div data-role="content">
			<button id="btnGetFromOrigin" onclick="btnGetFromOrigin_click()">Get Data from Origin.</button>
			<button id="btnGetFromMonster" onclick="btnGetFromMonster_click()">Get Data from lab2 worspace</button>
			<div id="result" style="font-size: 2em"></div>
			</div>
		
	</div>
	<!-- page -->

	<script>
		function btnGetFromOrigin_click() {
			$.get("getTime.php", doDataback);
		}
		
		function btnGetFromMonster_click() {
			$.get("https://lab2-appdev1226-1.c9users.io/0423/Demo_SameOriginPolicy/getTime.php", 
					doDataback);
		}
		
		function doDataback(data) {
			$("#result").text(data);
		}
		
	</script>
</body>
</html>
