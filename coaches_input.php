<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coaches-list</title>
<style>
    body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4; /* 背景色 */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* ビューポートの高さ */
        }
        .title-container {
            display: flex;
            text-align: center;
            justify-content: center;
        }

        
        form {
            background-color: #fff; /* フォーム背景色 */
            padding: 20px;
            border-radius: 8px; /* 角丸 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 影を追加 */
            text-align: center;
        }

</style>
</head>
<body>
    <div id="title-container">
    <h1>登録</h1>
    <a href="coaches_read.php">一覧画面</a>
    <!-- 送信するデータのenctypeは画像やPDFを送信する際に必要。 -->
    <form action="coaches_create.php" method="POST" enctype="multipart/form-data"> 
        
    <label for="name">名前:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="img">画像:</label><br>
        <input type="file" id="img" name="img" accept="image/*" required><br><br>

        <label for="tag">タグ:</label><br>
        <input type="text" id="tag" name="tag" placeholder="例: キャリア, ビジネス" required><br><br>

        <label for="comments">コメント:</label><br>
        <textarea id="comments" name="comments" rows="5" cols="40" required></textarea><br><br>

        <button type="submit">登録する</button>
    </fieldset>
  </form>

    </div>

</body>
</html>
