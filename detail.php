<?php

session_start();

if (isset($_SESSION['chk_ssid'])) {
    // ログインしている
    echo "ログイン中です。ユーザーID: " . $_SESSION['chk_ssid'];
} else {
    // ログインしていない
    echo "ログインしていません。";
}

//１．関数群の読み込み
require_once('funcs.php');
loginCheck();


$id = $_GET['id']; //?id~**を受け取る
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bookmark_table WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}

// $view = '';
// if ($status === false) {
//     $error = $stmt->errorInfo();
//     exit('SQLError:' . print_r($error, true));
// }


?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブックマーク更新</title>
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Head[Start] -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="select.php">ブックマーク一覧</a></div>
        </div>
    </nav>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="container">
        <h1>編集</h1>

        <form method="POST" action="update.php">
            <div class="jumbotron">
                <fieldset>
                    <label>作品名：<input type="text" name="book_name" value="<?= $row['book_name'] ?>"></label><br>
                    <label>URL：<input type="text" name="book_url" value="<?= $row['book_url'] ?>"></label><br>
                    <label>感想：<textArea name="book_comment" rows="4" cols="40"><?= $row['book_comment'] ?></textArea></label><br>
                    <input type="submit" value="更新する">
                    <input type="hidden" name="id" value="<?= $id ?>">
                </fieldset>
            </div>
        </form>
    </div>
    <!-- Main[End] -->


</body>

</html>