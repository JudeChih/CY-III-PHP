<?php 

if (!isset($_COOKIE["userName"]))
{
	setcookie("lastPage", "secret.php");
	header("Location: login.php");
	exit();
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lag - Member Page</title>
</head>
<body>

<table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 － 會員專用</font></td>
  </tr>
  <tr>
    <td align="center" valign="baseline">This page for member only.</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC"><a href="index.php">回首頁</a></td>
  </tr>
</table>


</body>
</html>