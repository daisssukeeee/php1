<?php
// ファイルを変数に格納
$filename = 'data/data.txt';

// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');

$txt = [];
// whileで行末までループ処理
while (!feof($fp)) {
  $line = fgets($fp);
  // 空行をスキップ
  if (!trim($line)) continue;

  $txt[] = explode(",", trim($line));
}

// fcloseでファイルを閉じる
fclose($fp);

// 配列を逆順にする
$txt = array_reverse($txt);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ表示</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>登録データ</h1>
<table>
    <tr>
        <th>お名前</th>
        <th>EMAIL</th>
        <th>オススメの本のタイトル</th>
        <th>著者名</th>
        <th>オススメ度</th>
        <th>コメント</th>
    </tr>
    <?php foreach ($txt as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row[1], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($row[2], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($row[3], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($row[4], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($row[5], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($row[6], ENT_QUOTES) ?></td>
          </tr>
    <?php endforeach; ?>
</table>

<a href="post.php">戻る</a>

</body>
</html>

