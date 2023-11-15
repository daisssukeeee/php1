<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
$title  = $_POST["title"];
$author = $_POST["author"];
$star = $_POST["star"];
$comment = $_POST["comment"];

$c    = ",";


//文字作成
$str = date("Y-m-d H:i:s").$c.$name.$c.$mail.$c.$title.$c.$author.$c.$star.$c.$comment;
//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み
fwrite($file, $str."\n"); //option+¥
fclose($file);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        padding: 20px;
    }
    h1 {
        color: #333;
        font-size: 24px;
    }
    p {
        background-color: #fff;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    a:hover {
        background-color: #45a049;
    }
    ul {
        list-style: none;
        padding: 0;
    }
</style>
</head>
<body>

<h1>アンケートが送信されました。</h1>
<p><?= htmlspecialchars($str, ENT_QUOTES) ?></p>

<ul>
    <li><a href="read.php">リストを見る</a></li>
    <li><a href="post.php">戻る</a></li>
</ul>

</body>
</html>