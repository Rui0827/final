<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>最終課題
    </title>

</head>

<body>
    <h1>BGM一覧</h1>
    <a href="insert-input.php?id=',$row['id'],'">登録</a>;
    <table>
        <tr>
            <th>BGMID</th>
            <th>BGM名</th>
            <th>作曲者</th>

        </tr>
        <?php
        $pdo=new PDO('mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1517370-final;charaset=utf8',username:'LAA1517370',password:'Pass0827');
        foreach($pdo->query('select * from BGMs')as $row){
            echo '<tr>';
            
          
            echo '<td>',$row['bgm_id'],'</td>';
            echo '<td>',$row['bgm_name'],'</td>';
            echo '<td>',$row['sakusha_name'],'</td>';
            echo '<td>';
            echo '<a href="update-input.php?id=',$row['bgm_id'],'">更新</a>';
            echo '</td>';
            echo '<td>';
            echo '<a href="delete.php?id=',$row['bgm_id'],'">削除</a>';
            echo '</td>';
            echo '</tr>';
            echo "\n";
        }
        
        ?>
    </table>
</body>

</html>