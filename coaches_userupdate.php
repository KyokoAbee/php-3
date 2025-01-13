<?php
// var_dump($_POST);
// exit();

include("FUNCTION.php");
$pdo = connect_to_db();


if (
    !isset($_POST['name']) || $_POST['name'] === '' ||
    !isset($_POST['gender']) || $_POST['gender'] === '' ||
    !isset($_POST['birthday']) || $_POST['birthday'] === '' ||
    !isset($_POST['mail']) || $_POST['mail'] === '' ||
    !isset($_POST['id']) || $_POST['id'] === ''
  ) {
    exit('データがありません');
  }

// POSTデータを変数に格納
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$mail = $_POST['mail'];
$id = $_POST['id']; // idもPOSTから取得

// SQLクエリ（ユーザー情報を更新）
$sql = 'UPDATE users SET name=:name, gender=:gender, birthday=:birthday, mail=:mail,updated_at=now() WHERE id=:id';


// SQL実行
try {
    // SQLの準備
    $stmt = $pdo->prepare($sql);

    // プレースホルダに値をバインド
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    // SQL実行
    $status = $stmt->execute();

    // 実行結果の確認
    if ($status) {
        // 成功した場合、リダイレクト。ここでid を渡す!!
        header('Location: coaches_userread.php?id=' . $id);
        exit();
    } else {
        // 実行失敗の場合、エラー詳細を表示
        $errorInfo = $stmt->errorInfo();
        echo "SQLエラー: " . htmlspecialchars($errorInfo[2], ENT_QUOTES, 'UTF-8');
    }
} catch (PDOException $e) {
    // エラーが発生した場合
    echo "PDOエラー: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    exit();
}


?>