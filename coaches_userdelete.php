<?php
include("FUNCTION.php");
$pdo = connect_to_db();

// GETで渡された id パラメータを取得
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// id が無効な場合は終了
if ($id === 0) {
    exit('無効なユーザーです。');
}


// SQLクエリの準備（指定された id のユーザーを削除）
$sql = 'DELETE FROM users WHERE id = :id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
    // SQL実行
    $status = $stmt->execute();

    // 実行結果の確認
    if ($status) {
  
        // 成功した場合は、coaches_userinfo.php にリダイレクト
        header("Location: coaches_userinfo.php");
        exit();
    } else {
        // 実行失敗の場合、エラー詳細を表示
        $errorInfo = $stmt->errorInfo();
        echo "SQLエラー: " . htmlspecialchars($errorInfo[2], ENT_QUOTES, 'UTF-8');
        exit();
    }
} catch (PDOException $e) {
    // エラーが発生した場合
    echo "PDOエラー: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    exit();
}
?>
