<?php

session_start();

if (isset($_SESSION['chk_ssid'])) {
    // ログインしている
    echo "ログイン中です。ユーザーID: " . $_SESSION['chk_ssid'];
} else {
    // ログインしていない
    echo "ログインしていません。";
}

// DB接続します
require_once('funcs.php');
$pdo = db_conn();

// ID取得
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM gs_bookmark_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>編集ページ</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="main">
    <header>
        <nav>
            <a href="index.php">新規登録</a>
            <a>　</a>
            <a href="select.php">登録一覧</a>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>メモ編集</h1>
            <form method="post" action="update.php">
                <input type="hidden" name="id" value="<?= htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8') ?>">
                <label>タイトル<input type="text" name="book_name" value="<?= htmlspecialchars($result['book_name'], ENT_QUOTES, 'UTF-8') ?>"></label><br>
                <label>URL<input type="text" name="book_url" value="<?= htmlspecialchars($result['book_url'], ENT_QUOTES, 'UTF-8') ?>"></label><br>
                <label>概要<textarea name="book_comment"><?= htmlspecialchars($result['book_comment'], ENT_QUOTES, 'UTF-8') ?></textarea></label><br>
                <input type="submit" value="更新">
            </form>
        </div>
    </main>
</body>
</html>

