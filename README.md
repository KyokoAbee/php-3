# ①課題番号-プロダクト名
- ユーザーの登録、更新、削除画面

## ②課題内容（どんな作品か）
- ユーザーの登録、更新、削除画面。なつきさんのログイン画面を参考にさせてもらいました。感謝!!　　
 --前回課題--
・coaches_input   コーチ情報入力
・coaches_create
・coaches_read　　コーチ一覧　
--ここまで--

--今回作成--
・coaches_userinfo ユーザー登録画面
・coaches_usercreate 登録処理
・coaches_userread 登録情報表示
・coaches_useredit 登録情報編集
・coaches_userdelete 登録情報削除

## ③工夫した点・こだわった点
- 前回のレビュー会で知った、DBログイン情報を.gitignore に入れて無視することを実装しました
- ユーザー情報の登録画面において、required で必須項目を指定したことに加えて、validateForm 関数で未来日付が選択されていないかや、メールアドレスの形式チェックを追加しました。エラーハンドリング。

## ④難しかった点・次回トライしたいこと(又は機能)
- 更新したユーザーの情報のみを画面表示したかったので、id を渡す(coaches_userupdate.phpの48行目)ことで実装しました。当初、idを指定し忘れていて処理がうまくいきませんでした。
- 操作ログを記録する機能を付けておきたい。

## ⑤質問・疑問・感想、シェアしたいこと等なんでも
- 書き方の型が決まっているのでphp 結構好きかもしれない。


