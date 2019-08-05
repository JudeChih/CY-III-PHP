<?php
require ("config.php");

$link = mysqli_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysqli_connect_error() );
$result = mysqli_query ( $link, "set names utf8" );
mysqli_select_db ( $link, $dbname );
$commandText = <<<SqlQuery
select id, firstName, lastName, title, picture,
  (select count(*) from employee where managerId = e.id) as reportCount
  from employee e
SqlQuery;

$result = mysqli_query ( $link, $commandText );
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
<div data-role="page" data-theme="c">

<div data-role="header">
	<h1>Employee Details</h1>
</div>

<div data-role="content">
	<ul data-role="listview" data-filter="true">
	<?php while ($row = mysqli_fetch_assoc($result)) : ?>
		<li>
		<a href="employeeDetails.php?id=<?php echo $row["id"] ?>"> 
			<img src="images/<?php echo $row["picture"]?>">
			<h4><?php echo $row["firstName"] . " " . $row["lastName"] ?></h4>
			<p><?php echo $row["title"] ?> </p> <span class="ui-li-count"><?php echo $row["reportCount"] ?></span>
		</a>
		</li>
	<?php endwhile ?>
	</ul>
</div>

</div>
<?php
mysqli_close ( $link );
?>
</body>
</html>