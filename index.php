<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['chk_ssid'])) {
    // ログインしている
    echo "ログイン中" ;
} else {
    // ログインしていない
    echo "ログインしていません";
}

?>

<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブックマークアプリ</title>
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav>
            <a href="select.php">登録一覧</a>
            <a>　</a>
            <a href="login.php">ログイン</a>
            <form action="logout.php" method="post" onsubmit="return confirm('本当にログアウトしますか？');">
            <button type="submit" class="logout-button">ログアウト</button>
            </form>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <main>
        <form method="POST" action="insert.php">
            <fieldset>
                <legend>Youtubeメモ</legend>
                <label for="book_name">タイトル</label>
                <input type="text" id="book_name" name="book_name" required placeholder="">

                <label for="book_url">URL</label>
                <input type="text" id="book_url" name="book_url" required placeholder="">

                <label for="book_comment">概要</label>
                <textarea id="book_comment" name="book_comment" rows="4" required placeholder=""></textarea>

                <input type="submit" value="登録">
            </fieldset>
        </form>
    </main>
    <!-- Main[End] -->


</body>

</html>
