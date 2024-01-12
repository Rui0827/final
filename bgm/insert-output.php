<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>練習6-5-output</title>

</head>

<body>
    <button onclick="location.href='menu.php'">トップへ戻る</button>
    <?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('insert into BGMs(bgm_name,sakusha) values(?,?)');
 
    $sql->execute([$_POST['name'],$_POST['sakusha']])
        echo '<font color="red">追加に成功しました。</font>';

   
    ?>
    <br>
    <hr><br>
    <table>
        <tr>
            <th>BGM名</th>
            <th>楽曲者</th>
            <th>価格</th>
            <?php
    foreach($pdo->query('select * from BGMs') as $row){
        echo '<tr>';
        echo '<td>',$row['bgm_id'],'</td>';
        echo '<td>',$row['bgm_name'],'</td>';
        echo '<td>',$row['sakusha'],'</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
    </table>
    <form action="insert-input.php" method="post">
        <button type="submit">追加画面へ戻る</button>
    </form>


</body>

</html>