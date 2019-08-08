<?php
header("content-type: text/html; charset=utf-8");

// 1. 初始設定
$ch = curl_init();

// 2. 登入
$url = $_SERVER ["SERVER_NAME"] . $_SERVER ["REQUEST_URI"];
$url = "http://" . 
    str_replace( basename(__FILE__), "login/login.php", $url );
echo $url, "<hr>";

$postData = array (
    "txtUserName" => "Chien",
    "txtPassword" => "password",
    "btnOK" => "OK"
);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
// CURLOPT_COOKIEJAR 指定如何接收儲存 Cookie
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
// CURLOPT_COOKIEFILE: 打算送出給 Server 的 Cookie 放在哪裏
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");

$output = curl_exec($ch);


// 3. 瀏覽會員專用網頁: secret.php
$url = $_SERVER ["SERVER_NAME"] . $_SERVER ["REQUEST_URI"];
$url = "http://" . 
    str_replace( basename(__FILE__), "login/secret.php", $url );
echo $url, "<hr>";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
// CURLOPT_COOKIEJAR 指定如何接收儲存 Cookie
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
// CURLOPT_COOKIEFILE: 打算送出給 Server 的 Cookie 放在哪裏
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");

$output = curl_exec($ch);

// 4. 關閉與釋放資源
curl_close($ch);


// 報告測試結果
if (preg_match("!Location: (.*)!i", $output, $matches)) {
    echo "網站要求重導到 $matches[1]\n";
} 
else {
    echo "不必重導\n";
}
echo "<hr>";

echo htmlspecialchars($output);

?>