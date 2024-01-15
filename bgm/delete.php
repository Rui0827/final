<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>delete-final</title>

</head>

<body>
    <button onclick="location.href='menu.php'">トップへ戻る</button>
    <?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('delete  from BGMs where id=? ');
 
    $sql->execute([$_GET['id']])
        echo '<font color="red">削除に成功しました。</font>';

   
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
    <form action="menu.php" method="post">
        <button type="submit">メニュー画面へ戻る</button>
    </form>


</body>

</html>