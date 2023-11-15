<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>オススメ本の紹介</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        padding: 20px;
    }
    h1 {
        color: #333;
    }
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    input[type="text"], input[type="textarea"] {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }
	input[type="textarea"] {
        height: 100px; /* テキストエリアの高さを調整 */
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 10px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .range-group {
        position: relative;
        margin: 10px 0;
    }
    .range-group > a {
        display: inline-block;
        width: 20px;
        height: 20px;
        cursor: pointer;
		margin-right: 20px; /* 星の間隔を設定 */

    }
    .range-group > a:before {
        content: "\2605";
        font-size: 40px;
        color: #aaa;
    }
    .range-group > a.on:before {
        color: #fc3;
    }
	.input-range {
        display: none; /* 青いバーを非表示にする */
    }
</style>
</head>
<body>
<h1>オススメ本を紹介し合おう！</h1>
<form action="write.php" method="post">
    お名前: <input type="text" name="name">
    EMAIL: <input type="text" name="mail">
    本のタイトル: <input type="text" name="title">   
    著者名: <input type="text" name="author">  
    オススメ度: 
    <div class="range-group">
        <input type="range" min="1" max="5" value="" class="input-range" name="star"/>
    </div> 
    オススメのコメント: <input type="textarea" name="comment">   
    <input type="submit" value="送信">
</form>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        $('.range-group').each(function() {
            for (var i = 0; i < 5; i++) {
                $(this).append('<a></a>');
            }
        });

        $('.range-group > a').on('click', function() {
            var index = $(this).index();
            $(this).parent().find('.input-range').val(index);

            // すべての星の 'on' クラスを削除
            $(this).siblings().removeClass('on');
            // 選択した星とその左側の星に 'on' クラスを適用
            for (var i = 0; i < index; i++) {
                $(this).parent().find('a').eq(i).addClass('on');
            }
        });
    });
</script>
</body>
</html>
