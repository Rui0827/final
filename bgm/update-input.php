<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="update-input.css">

    <title>update-final</title>
</head>

<body>
    <table>
        <tr>
            <th>BGM名</th>
            <th>作曲者</th>
        </tr>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from BGMs where bgm_id=?');
        $sql->execute([$_GET['bgm_id']]);

        foreach ($sql as $row) {
            echo '<tr>';
            echo '<form action="update-output.php" method="post">';
            
            // 隠しフィールドにbgm_idを追加
            echo '<input type="hidden" name="bgm_id" value="', $row['bgm_id'], '">';

            echo '<td>';
            echo '<input type="text" name="bgm_name" value="', $row['bgm_name'], '">';
            echo '</td> ';
            echo '<td>';
            echo ' <input type="text" name="sakusha_name" value="', $row['sakusha_name'], '">';
            echo '</td> ';
            echo '<td><input type="submit" value="更新"></td>';
            echo '</form>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
    <button onclick="location.href='menu.php'">トップへ戻る</button>
</body>

</html>