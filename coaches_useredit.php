<?php
include("FUNCTION.php");

$id = $_GET['id'];

$pdo = connect_to_db();

$sql = 'SELECT * FROM users WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/userinfo.css">
</head>
<body>
<form action="coaches_userupdate.php" method="POST"> 
        <!-- メンバー情報 -->
        <fieldset>
            <legend>登録情報</legend>
            <label for="name">氏名：</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8') ?>"><br>

            <label for="gender">性別：</label>
            <input type="radio" id="male" name="gender" value="男性" <?= ($record['gender'] == '男性') ? 'checked' : '' ?>> 男性
            <input type="radio" id="female" name="gender" value="女性" <?= ($record['gender'] == '女性') ? 'checked' : '' ?>> 女性
            <input type="radio" id="none" name="gender" value="答えたくない" <?= ($record['gender'] == '答えたくない') ? 'checked' : '' ?>> 答えたくない<br>

            <label for="birthday">生年月日：</label>
            <input type="date" id="birthday" name="birthday" value="<?= htmlspecialchars($record['birthday'], ENT_QUOTES, 'UTF-8') ?>"><br>

            <label for="mail">メールアドレス：</label>
            <input type="mail" id="mail" name="mail" value="<?= htmlspecialchars($record['mail'], ENT_QUOTES, 'UTF-8') ?>"><br>

            <!-- 隠しフィールドでIDを送信 -->
            <input type="hidden" name="id" value="<?= htmlspecialchars($record['id'], ENT_QUOTES, 'UTF-8') ?>">
        </fieldset>

        <button type="submit">登録情報を更新</button>
</body>
</html>