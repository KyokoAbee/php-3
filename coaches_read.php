<?php 
// DB接続。FUNCTION.php に記載
include('FUNCTION.php');
$pdo = connect_to_db();


// SQL作成&実行
$sql = 'SELECT * FROM coaches';
$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// 結果を連想配列として取得
$coaches = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h1>一覧</h1>
        <a href="coaches_input.php">入力画面</a>

        <?php foreach ($coaches as $coach): ?>
        <!-- coaches テーブルの各コーチに対してのループ -->
        <div class="coach-card">
            <img src="<?= htmlspecialchars($coach['img'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($coach['name'], ENT_QUOTES, 'UTF-8') ?>">

            <div class="coach-info">
                <h2><?= htmlspecialchars($coach['name'], ENT_QUOTES, 'UTF-8') ?></h2>
                <div class="tags">
                    <?php
                    // タグを配列に変換して表示
                    $tags = explode(',', $coach['tag']);
                    foreach ($tags as $tag): 
                    ?>
                        <span><?=htmlspecialchars(trim($tag), ENT_QUOTES, 'UTF-8') ?></span>
                    <?php endforeach; ?>
                </div>
                <p class="comments">
                    <!-- <?= nl2br(htmlspecialchars($coach['comments'], ENT_QUOTES, 'UTF-8')) ?> -->
                    <?php
                    // コメントを150 字に切り取る
                    $short_comment = mb_substr($coach['comments'],0,150);
                    // コメントが150 時以上であれば切り取った部分をトランケート
                    $is_truncated = mb_strlen($coach['comments']) > 150;
                    ?>
                    
                    <span class="short-comment">
                        <?= nl2br(htmlspecialchars($short_comment, ENT_QUOTES, 'UTF-8')) ?>
                        <?= $is_truncated ? '…' : ''?>
                    </span>
                    <?php if ($is_truncated): ?>
                        <!-- コメントが切り取られている場合、全コメントを非表示にしておく -->
                        <span class="full-comment" style="display: none;">
                            <?= nl2br(htmlspecialchars($coach['comments'], ENT_QUOTES, 'UTF-8')) ?>
                        </span>
                    <?php endif; ?>
                </p>
            </div>

        </div>
        <?php endforeach; ?>
    </div>

    <!-- <div class="session-banner">体験セッションはこちら</div> -->
    <a class="session-banner" href="coaches_userinfo.php">体験セッションはこちら</a>

    <script>
        // ページが読み込まれた後に実行する
        document.addEventListener('DOMContentLoaded', () => {
            // すべてのcoach-card を取得
            const coachCards = document.querySelectorAll('.coach-card');

            coachCards.forEach(card => {
                // coach-card をクリックしたときの動作
                card.addEventListener('click', () => {
                    const shortComment = card.querySelector('.short-comment'); //短いコメント
                    const fullComment = card.querySelector('.full-comment'); //全文コメント

                    if (shortComment && fullComment) {
                        // 全文コメントが表示されているかどうかを判定
                        const isFullVisible = fullComment.style.display == 'block';
                        // コメントの表示切り替え
                        shortComment.style.display = isFullVisible ? 'block' : 'none';
                        fullComment.style.display = isFullVisible ? 'none' : 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>