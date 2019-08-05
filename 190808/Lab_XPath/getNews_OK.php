<?php
header("content-type: text/html; charset=utf-8");

// 1. 初始設定
$ch = curl_init();

// 2. 設定 / 調整參數
curl_setopt($ch, CURLOPT_URL, "https://www.taipower.com.tw/TC/news2.aspx?mid=225");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

// 3. 執行，取回 response 結果
$pageContent = curl_exec($ch);

// 4. 關閉與釋放資源
curl_close($ch);

$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($pageContent);

$xpath = new DOMXPath($doc);
$entries = $xpath->query('//*[@id="news_box3"]/div[2]/ul/li');
foreach ($entries as $entry) 
{
    $title = $xpath->query("./a/div/h3", $entry);
    echo "Title：" . $title->item(0)->nodeValue . "<br>";
}

?>
