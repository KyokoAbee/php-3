<?php
var_dump($_POST);
// POSTデータ確認
if (
    !isset($_POST['name']) || $_POST['name'] === '' ||
    !isset($_POST['gender']) || $_POST['gender'] === '' ||
    !isset($_POST['birthday']) || $_POST['birthday'] === '' ||
    !isset($_POST['mail']) || $_POST['mail'] === ''
  ) {
    exit('データがありません');
  }

//   var_dump('ok');

// POSTデータ取得
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$mail = $_POST['mail'];

// DB接続。FUNCTION.php に記載
include('FUNCTION.php');
$pdo = connect_to_db();


// SQL作成&実行 SQLインジェクション
$sql = 'INSERT INTO users (id, name, gender, birthday, mail, created_at, updated_at) 
                    VALUES (NULL, :name, :gender, :birthday, :mail, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// リダイレクトするためにID情報を取得
$user_id = $pdo->lastInsertId();
var_dump($user_id);
// リダイレクト先のページにユーザーIDを渡す
header("Location: coaches_userread.php?id=" . $user_id);
exit();
?>