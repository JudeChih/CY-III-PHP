<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

	<input type="text" id="txt">
	<input type="button" id="btnSend" value="Send">
	<hr>
	<div id="debug"></div>

	<script>
		function log(msg) {
			document.getElementById("debug").innerHTML += msg + "<br>";
		}
		
		// var host = "ws://www.beauty.com:9000";
		var host = "ws://127.0.0.1:9000";
		var socket = new WebSocket(host);

		socket.onopen = function(msg) {
			log("Welcome - status "+this.readyState);
		};

		socket.onmessage = function(msg) {
			log("Received: "+msg.data);
		};

		socket.onclose = function(msg) {
			log("Disconnected - status " + this.readyState);
		};

		document.getElementById("btnSend").onclick = function (e) {
			var s = document.getElementById("txt").value;
			log("Sending message: " + s);
			socket.send(s);
		}
	</script>

</body>
</html>