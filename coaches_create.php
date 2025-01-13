<?php
var_dump($_POST);
// POSTデータ確認
if (
    !isset($_POST['name']) || $_POST['name'] === '' ||
    !isset($_POST['comments']) || $_POST['comments'] === '' ||
    !isset($_FILES['img']) || $_FILES['img'] === ''
  ) {
    exit('必要なデータが不足しています。');
  }

  var_dump('ok');

// 変数を設定
$name = $_POST['name'];
$comments = $_POST['comments'];
$tag = $_POST['tag'];
$file = $_FILES['img'];

// アップロード先のフォルダ
$uploadDir = 'img/';

// アップロードされたファイル名を一意にする
$uniqueName = uniqid() . '_' . basename($file['name']);

// 保存先のパスを指定
$uploadPath = $uploadDir . $uniqueName;

// ファイルを移動
if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
    echo "ファイルのアップロード成功: " . $uploadPath;
} else {
    exit("ファイルのアップロードに失敗しました。");
}


// DB接続。FUNCTION.php に記載
include('FUNCTION.php');
$pdo = connect_to_db();


// SQL作成&実行
$sql = 'INSERT INTO coaches (id, name, img, tag, comments, created_at, updated_at) 
        VALUES (NULL, :name, :img, :tag, :comments, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindValue(':img', $uploadPath, PDO::PARAM_STR); // アップロードされた画像のパスを指定
$stmt->bindValue(':tag', $_POST['tag'], PDO::PARAM_STR);
$stmt->bindValue(':comments', $_POST['comments'], PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:coaches_input.php');