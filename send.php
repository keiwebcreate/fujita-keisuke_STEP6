<?php
// b) フォーム以外からのアクセスはcontact.phpにリダイレクト
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: contact.php");
  exit;
}

// HTMLエスケープ用ヘルパー関数
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

// a) POSTデータの受け取り
$name    = isset($_POST["name"])    ? trim($_POST["name"])    : "";
$company = isset($_POST["company"]) ? trim($_POST["company"]) : "";
$email   = isset($_POST["email"])   ? trim($_POST["email"])   : "";
$age     = isset($_POST["age"])     ? trim($_POST["age"])     : "";
$content = isset($_POST["content"]) ? trim($_POST["content"]) : "";

// a) 宛先メールアドレス（任意：受け取りたいアドレスを設定）
$to = "your-email@example.com";

// b) 件名
$subject = "お問い合わせがありました";

// c) 本文（name, company, email, age, content を含める）
$body  = "以下の内容でお問い合わせがありました。\n";
$body .= "\n";
$body .= "名前：" . $name    . "\n";
$body .= "会社名：" . $company . "\n";
$body .= "メールアドレス：" . $email   . "\n";
$body .= "年齢：" . $age     . "\n";
$body .= "お問い合わせ内容：\n" . $content . "\n";

// メールヘッダー（文字化け防止のためUTF-8を指定）
$headers = "From: no-reply@example.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// メール送信（Dockerローカル環境では実際には送信されない）
$result = mail($to, $subject, $body, $headers);

// d) 成功 / e) 失敗 の判定
$success = $result;
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>お問い合わせフォーム - 送信完了画面</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h2>お問い合わせフォーム - 送信完了画面</h2>
    </header>
    <main>
      <?php if ($success): ?>
        <!-- d) 送信成功メッセージ -->
        <p>お問い合わせが送信されました。ありがとうございます！</p>
      <?php else: ?>
        <!-- e) 送信失敗メッセージ -->
        <p class="error-list">メールの送信に失敗しました。お手数ですが、時間をおいて再度お試しください。</p>
      <?php endif; ?>
      <a href="contact.php">お問い合わせフォームに戻る</a>
    </main>
    <footer></footer>
  </body>
</html>
