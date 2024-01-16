<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>update-final</title>
</head>

<body>
    <table>
        <tr>
            <th>商品番号</th>
            <th>商品名</th>
            <th>商品価格</th>
        </tr>
        <?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from BGMs where id=?');
	$sql->execute([$_POST['id']]);


	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="update-output.php" method="post">';
        
	
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