<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript">
function DocumentReady()
{
    $("#ResponseDiv").text("This is a div to hold the response.").css("color", "blue");
}

$(document).ready(DocumentReady);

function MakeRequest()
{
  $.get('ajaxServer.php?data=' + $("#txtTest").val(), 
    function(data) {
	  $("#ResponseDiv").text(data);
  	}
  )
}

</script>
<title>PHP AJAX Example</title>
</head>
<body>
	Your name:
	<input type="text" name="txtTest" id="txtTest">
	<input type='button' onclick='MakeRequest();' value='Use AJAX!!!!' />
	<br> Other data:
	<input type="text" name="txtOther" id="txtOther">
	<br>
	<hr>
	<div id='ResponseDiv'>...</div>
</body>
</html>
