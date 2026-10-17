// 設問9・10・11・12: フォーム送信時の未入力チェックと確認ダイアログ

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  // フォームが存在しないページ（confirm.php等）では何もしない
  if (!form) return;

  form.addEventListener("submit", function (event) {
    // a) 各入力項目の値を取得（DOMから要素IDで取得）
    const name        = document.getElementById("name").value;
    const companyName = document.getElementById("company").value;
    const email       = document.getElementById("email").value;
    const age         = document.getElementById("age").value;
    const message     = document.getElementById("content").value;

    // 設問10・11: 未入力チェック → 空欄があれば送信キャンセル＋アラート
    if (name === "" || companyName === "" || email === "" || age === "" || message === "") {
      event.preventDefault(); // b) 送信をキャンセル
      alert("必須項目が未入力です。入力内容をご確認ください。");
      return;
    }

    // 設問12: 全項目入力済みなら確認ダイアログを表示
    const confirmMessage =
      "下記の内容を本当に送信しますか？\n\n" +
      "お名前 ➡ "         + name        + "\n" +
      "会社名 ➡ "         + companyName + "\n" +
      "メールアドレス ➡ " + email       + "\n" +
      "年齢 ➡ "           + age         + "\n" +
      "お問い合わせ内容 ➡ " + message;

    // OKなら送信、キャンセルなら中止
    if (!confirm(confirmMessage)) {
      event.preventDefault();
    }
  });

  // 設問13: footer背景色変更ボタンの処理
  // a) 「押してみてね！」ボタンを取得
  const footerBtn = document.querySelector("footer button");

  if (footerBtn) {
    // c) 背景色を変更する要素「footer」を取得
    const footer = document.querySelector("footer");

    // d) 4色を配列に保存（青 → 赤 → 黄色 → 灰色）
    const colors = ["blue", "red", "yellow", "gray"];

    // 現在の色インデックス
    let colorIndex = 0;

    // e) ボタンがクリックされるたびに次の色に変更
    footerBtn.addEventListener("click", function () {
      footer.style.backgroundColor = colors[colorIndex];
      // f) 最後の色（灰色）の次は最初の色（青）に戻る
      colorIndex = (colorIndex + 1) % colors.length;
    });
  }
});
