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
    (empty($_POST['name'])){
        echo '商品名を入力してください';

    }(empty)
    else if($sql->execute([$_POST['id'],$_POST['name'],$_POST['price']])){
        echo '<font color="red">追加に成功しました。</font>';

    }else{
        echo '<font color="red">追加に失敗しました。</font>';

    }
    ?>
    <br>
    <hr><br>
    <table>
        <tr>
            <th>商品番号</th>
            <th>商品名</th>
            <th>価格</th>
            <?php
    foreach($pdo->query('select * from product') as $row){
        echo '<tr>';
        echo '<td>',$row['id'],'</td>';
        echo '<td>',$row['name'],'</td>';
        echo '<td>',$row['price'],'</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
    </table>
    <form action="ren6-5-input.php" method="post">
        <button type="submit">追加画面へ戻る</button>
    </form>


</body>

</html>