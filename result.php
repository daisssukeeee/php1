<?php
// ファイルを変数に格納
$filename = 'data/data.txt';

// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');

// オススメ度の集計用配列
$starCount = array_fill(1, 5, 0);

// whileで行末までループ処理
while (!feof($fp)) {
    $line = fgets($fp);
    if (!trim($line)) continue;

    $data = explode(",", trim($line));
    $star = isset($data[5]) ? (int)$data[5] : 0; // オススメ度の位置を修正
    if ($star >= 1 && $star <= 5) {
        $starCount[$star]++;
    }
}

fclose($fp);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>オススメ度の集計結果</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #starChart {
            max-width: 600px;
            max-height: 400px;
        }
    </style>
</head>
<body>

<h1>オススメ度の集計結果</h1>
<canvas id="starChart" width="400" height="400"></canvas>
<script>
    let ctx = document.getElementById('starChart').getContext('2d');
    let starChart = new Chart(ctx, {
        type: 'bar', // 棒グラフを指定
        data: {
            labels: ['1星', '2星', '3星', '4星', '5星'],
            datasets: [{
                label: 'オススメ度',
                data: [<?php echo implode(', ', $starCount); ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
