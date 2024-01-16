<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>insert-final</title>
</head>

<body>
    <p>商品を追加します</p>
    <form action="insert-output.php" method="post">
        BGM名<input type="text" name="bgm_name"><br>
        作曲者<input type="text" name="sakusha_name"><br>

        <button type="submit">追加</button>
    </form>
    <form action="menu.php" method="post">
        <button type="submit">ホーム画面へ戻る</button>
    </form>
</body>

</html>