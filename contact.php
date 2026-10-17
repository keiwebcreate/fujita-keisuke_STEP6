<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h2>お問い合わせフォーム</h2>
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
      <form action="confirm.php" method="post">
        <table border="3">
          <tr>
            <td class="form-label"><label for="name">お名前</label></td>
            <td class="form-input">
              <input type="text" id="name" name="name" size="40" />
            </td>
          </tr>
          <tr>
            <td class="form-label"><label for="company">会社名</label></td>
            <td class="form-input">
              <input type="text" id="company" name="company" size="40" />
            </td>
          </tr>
          <tr>
            <td class="form-label">
              <label for="email">メールアドレス</label>
            </td>
            <td class="form-input">
              <input type="text" id="email" name="email" size="40" />
            </td>
          </tr>
          <tr>
            <td class="form-label"><label for="age">年齢</label></td>
            <td class="form-input">
              <input type="text" id="age" name="age" size="40" />
            </td>
          </tr>
          <tr>
            <td class="form-label">
              <label for="content">お問い合わせ内容</label>
            </td>
            <td class="form-input">
              <textarea name="content" id="content" placeholder="お問い合わせ内容"></textarea>
            </td>
          </tr>
        </table>
        <input type="submit" value="送信" />
      </form>
    </main>
    <footer class="change-background-color">
      <p>横のボタンを押すとfooterの背景色が変わります。</p>
      <button>押してみてね！</button>
    </footer>
    <script src="./style.js"></script>
  </body>
</html>
