<?php
if (! isset ( $_GET ["id"] ))
	die ( "Parameter id not found." );

$id = $_GET ["id"];
if (! is_numeric ( $id ))
	die ( "id not a number." );

require ("config.php");
$link = mysqli_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysqli_connect_error() );
$result = mysqli_query ( $link, "set names utf8");
mysqli_select_db ( $link, $dbname );
$commandText = <<<SqlQuery
select id, firstName, lastName, title, city, 
  officePhone, cellPhone, email, picture
  from employee
  where id = $id
SqlQuery;

$result = mysqli_query ( $link, $commandText );
$row = mysqli_fetch_assoc ( $result );
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<script src="scripts/jquery-1.9.1.min.js"></script>
<script src="scripts/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" href="scripts/jquery.mobile-1.3.2.min.css" />
<link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="action-list"></div>
	<div data-role="page" data-add-back-btn="true" data-theme="c">
		<div data-role="header">
			<h1>Employee Details</h1>
		</div>
		<div data-role="content">
			<img src="images/<?php echo $row["picture"] ?>" class="employee-pic" width="100" />
			<div class="employee-details">
				<h3><?php echo $row["firstName"] . " " . $row["lastName"] ?></h3>
				<p><?php echo $row["title"] ?></p>
				<p><?php echo $row["city"] ?></p>
			</div>

			<ul data-role="listview" data-inset="true" class="action-list">
				<li><h4>Call office</h4><p><?php echo $row["officePhone"] ?></p></li>
				<li><h4>Call cell</h4><p><?php echo $row["cellPhone"] ?></p></li>
				<li><h4>SMS</h4><p><?php echo $row["cellPhone"] ?></p></li>
				<li><h4>Email</h4><p><?php echo $row["email"] ?></p></li>
			</ul>
		</div>
	</div>
</body>
</html>
