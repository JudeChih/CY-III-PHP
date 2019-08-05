<?php 
  session_start();
  $sPrompt = "";
  
  if (isset($_POST["btnOK"])) {
  	$sUserName = $_POST["txtUserName"];
  	if ($sUserName == "")
  		$sPrompt = "Please keyin your name.";
  	else
  	{
  		$_SESSION["userName"] = $sUserName;
  		header("Location: hello.php");
  		exit();
  	}
  }
  
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>A Form</title>
</head>
<body>
	<form method="post" action="index.php">
		Your name: <input type="text" name="txtUserName" />
		<input type="submit" name="btnOK" value="OK" /><br>
		<div><?php echo $sPrompt ?></div>
	</form>
</body>
</html>