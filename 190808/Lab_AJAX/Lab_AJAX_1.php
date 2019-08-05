<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(init);


function init() {
	$("#letter").change(letterChange);
}

function letterChange() {
	// var s = $("#letter option:selected").val();
	var s = $("#letter option:selected").text();
	$("#test").text(s);
}

</script>
</head>
<body>

	<form method="post" action="http://exec.hostzi.com/echo.php">
		<select name="letter" id="letter">
			<option value="0">A</option>
			<option value="1">B</option>
			<option value="2">C</option>
		</select>&nbsp;|&nbsp; 
		<select name="letterNumber" id="letterNumber">
			<option value="0">A01</option>
			<option value="1">B02</option>
			<option value="2">C03</option>
		</select> 
		<input type="submit" value="OK" /> 
		<br><div id="test"></div>
	</form>

</body>
</html>