<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
$age = $_POST["age"];
?>
<html>
<head>
<meta charset="utf-8">
<title>POST（受信）</title>
</head>
<body>
お名前：<?=$name?>
EMAIL：<?=$mail?>
年齢：<?=$age?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>