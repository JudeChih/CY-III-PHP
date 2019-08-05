<?php
require_once("tools.php");
$key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');

$data = "";
$key = 'Pa$$w0rd';
if (isset ( $_POST ["btnWriteCookie"] )) {
	$data = $_POST ["txtData"];
	// 加密
	$EncryptedData = UnsafeCrypto::encrypt($data, $key);
	setcookie ( "cookieData", $EncryptedData, time () + 3600 * 24 * 7);
}

if (isset ( $_POST ["btnReadCookie"] )) {
	if (isset ( $_COOKIE ["cookieData"] )) {
		$data = $_COOKIE ["cookieData"];
		// 解密
		$data =  UnsafeCrypto::decrypt($data, $key);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<?php require("script_css.php")?>
</head>
<body>
	<div id="labPage" data-role="page" data-theme="d">
		<div data-role="header">
			<h3>Lab</h3>
		</div>

		<div data-role="content">
			<form method="post" action="index.php" data-ajax="false">
				<input type="text" name="txtData" value="<?php echo $data; ?>" />
				<div class="ui-grid-a">
					<div class="ui-block-a">
						<input type="submit" name="btnWriteCookie" value="Write Cookie" />
					</div>
					<div class="ui-block-b">
						<input type="submit" name="btnReadCookie" value="Read Cookie" />
					</div>
				</div>
				<div>
					<ol data-role="listview" data-inset="true">
						<li data-role="list-divider">測試</li>
						<li>輸入資料，點按 Write Cookie 按鈕</li>
						<li>手動修改 Cookie 檔內容<br>以Chrome為例，<br>組合鍵:Ctrl+Shift+J，<br>然後輸入: document.cookie="cookieData=125"</li>
						<li>點按 Read Cookie 按鈕</li>
					</ol>
				</div>
			</form>
		</div>

	</div>
	<!-- page -->

	<script>
		
	</script>
</body>
</html>
