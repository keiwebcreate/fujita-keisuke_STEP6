<?php
// c) フォーム以外からのアクセスはcontact.phpにリダイレクト
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: contact.php");
  exit;
}

// フォームフィールドの定義（キー => ラベル名）
$fields = [
  "name"    => "お名前",
  "company" => "会社名",
  "email"   => "メールアドレス",
  "age"     => "年齢",
  "content" => "お問い合わせ内容",
];

$values = [];
$errors = [];

// a) POSTデータの受け取り & b) 未入力チェック
foreach ($fields as $key => $label) {
  $value = isset($_POST[$key]) ? trim($_POST[$key]) : "";
  $values[$key] = $value;
  if ($value === "") {
    $errors[] = $label . "が入力されていません。";
  }
}

// e) HTMLエスケープ用ヘルパー関数
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>お問い合わせフォーム - 確認画面</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h2>お問い合わせフォーム - 確認画面</h2>
    </header>
    <aside>
      <ul class="link-list">
        <li class="link-item"><a href="#">トップページ</a></li>
        <li class="link-item"><a href="#">人気投稿</a></li>
        <li class="link-item"><a href="#">エンジニアおすすめ商品</a></li>
        <li class="link-item"><a href="#">エンジニアおすすめ記事</a></li>
        <li class="link-item"><a href="#">投稿ページ</a></li>
      </ul>
    </aside>
    <main>
      <?php if (!empty($errors)): ?>
        <!-- b) エラーメッセージの表示 -->
        <ul class="error-list">
          <?php foreach ($errors as $error): ?>
            <li><?php echo h($error); ?></li>
          <?php endforeach; ?>
        </ul>
        <div class="form-buttons">
          <input type="button" value="戻る" onclick="history.back()" />
        </div>
      <?php else: ?>
        <!-- d) 受け取ったデータをテーブル形式で表示 -->
        <!-- f) hiddenフィールドでsend.phpにデータを渡す -->
        <form action="send.php" method="post" class="confirm-form">
          <table border="3">
            <?php foreach ($fields as $key => $label): ?>
              <tr>
                <td class="form-label"><?php echo h($label); ?></td>
                <td class="form-input">
                  <!-- e) HTMLエスケープして表示 -->
                  <?php echo h($values[$key]); ?>
                  <!-- f) hiddenフィールドでsend.phpへ渡す -->
                  <input type="hidden" name="<?php echo h($key); ?>" value="<?php echo h($values[$key]); ?>" />
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
          <div class="form-buttons">
            <input type="button" value="戻る" onclick="history.back()" />
            <input type="submit" value="送信" />
          </div>
        </form>
      <?php endif; ?>
    </main>
    <footer></footer>
  </body>
</html>
