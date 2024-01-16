<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>update-output</title>
</head>

<body>
    <button onclick="location.href='ren6-8-top.php'">トップへ戻る</button>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    // SQL発行準備 prepareメソッド　作成２
    $sql=$pdo->prepare('update BGMs set bgm_name=?,sakusha=? where id=?');
    if (empty($_POST['bgm_name'])) {
        echo 'BGM名を入力してください。';
    } else
    if (empty($_POST['sakusha'])) {
        echo '作曲者を入力してください。';
    } else
    //SQLを発行 excuteメソッド　作成３
    //更新に成功しました　作成４
    //更新に失敗しまし　作成５
    if($sql->execute([htmlspecialchars($_POST['bgm_name']),$_POST['sakusha'],$_POST['id']])){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }
    
?>
    <hr>
    <table>
        <tr>
            <th>商品番号</th>
            <th>商品名</th>
            <th>商品価格</th>
        </tr>

        <?php
foreach ($pdo->query('select * from BGMs') as $row) {
    echo '<tr>';
    echo '<td>', $row['bgm_id'], '</td>';
    echo '<td>', $row['bgm_name'], '</td>';
    echo '<td>', $row['sakusha'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
    </table>
    <button onclick="location.href='ren6-6-input.php'">更新画面へ戻る</button>
</body>

</html>