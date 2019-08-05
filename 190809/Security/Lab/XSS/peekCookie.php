<?php
$data = "";
if (isset ( $_GET ["CookieData"] )) {
	$data = $_GET ["CookieData"];
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
			<h3><?php echo $data; ?></h3>
			<a href="index.php" data-role="button">Home</a>
		</div>

	</div>
	<!-- page -->

	<script>
		
	</script>
</body>
</html>
