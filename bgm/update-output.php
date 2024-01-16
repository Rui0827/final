<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>update-output</title>
</head>

<body>
    <button onclick="location.href='menu.php'">トップへ戻る</button>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    // SQL発行準備 prepareメソッド　作成２
    $sql=$pdo->prepare('update BGMs set bgm_name=?,sakusha_name=?');
    if (empty($_POST['bgm_name'])) {
        echo 'BGM名を入力してください。';
    } else
    if (empty($_POST['sakusha_name'])) {
        echo '作曲者を入力してください。';
    } else
    //SQLを発行 excuteメソッド　作成３
    //更新に成功しました　作成４
    //更新に失敗しまし　作成５
    if($sql->execute([htmlspecialchars($_POST['bgm_name']),$_POST['sakusha_name']])){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }
    
?>
    <hr>
    <table>
        <tr>

            <th>BGM名</th>
            <th>作曲者</th>
        </tr>

        <?php
foreach ($pdo->query('select * from BGMs') as $row) {
    echo '<tr>';
    echo '<td>', $row['bgm_id'], '</td>';
    echo '<td>', $row['bgm_name'], '</td>';
    echo '<td>', $row['sakusha_name'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
    </table>
    <button onclick="location.href='update-input.php'">更新画面へ戻る</button>
</body>

</html>