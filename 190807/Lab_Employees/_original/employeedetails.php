<!DOCTYPE HTML>
<html>
<head>
<title>Employee Details</title>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<link rel="stylesheet" href="css/jquery.mobile-1.0rc2.min.css" />
<link rel="stylesheet" href="css/styles.css" />
</head>
    
<body>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>Employee Details</h1>
	</div>

  	<div data-role="content"> 

		<?php
		include 'config.php';

		$sql = "select e.id, e.firstName, e.lastName, e.managerId, e.title, e.department, e.city, e.officePhone, e.cellPhone, " .
				"e.email, e.picture, m.firstName managerFirstName, m.lastName managerLastName, count(r.id) reportCount " . 
				"from employee e left join employee r on r.managerId = e.id left join employee m on e.managerId = m.id " .
				"where e.id=:id group by e.lastName order by e.lastName, e.firstName";

		try {
			$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $dbh->prepare($sql);  
			$stmt->bindParam("id", $_GET[id]);
			$stmt->execute();
			$employee = $stmt->fetchObject();  
			$dbh = null;
		?>	
			
  			<img src="pics/<?php echo $employee->picture ?>" class="employee-pic" width="100"/>
			<div class="employee-details">
       			<h3><?php echo "$employee->firstName $employee->lastName" ?></h3>
       			<p><?php echo $employee->title?></p>
       			<p><?php echo $employee->city?></p>
   			</div>
	 
    		<ul data-role="listview" data-inset="true" class="action-list">
		    	<?php
	    		if ($employee->managerId > 0)
	    		{	
					echo "<li><a href='employeedetails.php?id=$employee->managerId'><h3>View Manager</h3><p>$employee->managerFirstName $employee->managerLastName</p></a></li>";
				}
	    		if ($employee->reportCount > 0)
	    		{	
					echo "<li><a href='reportlist.php?managerId=$employee->id'><h3>View direct reports</h3><p>$employee->reportCount</p></a></li>";
				}
		    	if (!is_null($employee->officePhone))
		    	{
					echo "<li><a href='tel:$employee->officePhone'><h3>Call office</h3><p>$employee->officePhone</p></a></li>";
				}
		    	if (!is_null($employee->cellPhone))
		    	{
					echo "<li><a href='tel:$employee->cellPhone'><h3>Call cell</h3><p>$employee->cellPhone</p></a></li>";
					echo "<li><a href='sms:$employee->cellPhone'><h3>SMS</h3><p>$employee->cellPhone</p></a></li>";
				}
		    	if (!is_null($employee->email))
		    	{
					echo "<li><a href='mailto:$employee->email'><h3>Email</h3><p>$employee->email</p></a></li>";
				}
		    	?>
    		</ul>
		
		<?php	
		} catch(PDOException $e) {
			echo $e->getMessage(); 
		}
		?>


  	</div>

</div>

<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/jquery.mobile-1.0rc2.min.js"></script>
</body>

</html>