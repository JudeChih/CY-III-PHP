<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab - Get Data From Server</title>
<link rel="stylesheet"
	href="jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="jquery-1.9.1.min.js"></script>
<script src="jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
	<div data-role="page">
		<div data-role="content">

			<fieldset data-role="controlgroup">
				<label for="txtUnitsInStock">庫存數量:</label> <input type="text"
					name="txtUnitsInStock" id="txtUnitsInStock" value="100" /> 
				<input type="button" id="btnRefresh" value="Refresh" data-icon="refresh" />
			</fieldset>
		</div>
	</div>


	<script type="text/javascript">
		$("#btnRefresh").click(btnRefresh_click);

		function btnRefresh_click() {
			var sID = "1";
			$.get('http://www.monster.com/Lab/JSONP/GetProductJsonAllowAll.php?id=' + sID, DataArrived);
		}

		function DataArrived(data) {
			var objProduct = eval("(" + data + ")");
			$("#txtUnitsInStock").val(objProduct.UnitsInStock);
		}
	</script>


</body>
</html>