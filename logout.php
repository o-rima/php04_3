<?php
//必ずsession_startは最初に記述
session_start();

// POSTリクエストであることを確認
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //SESSIONを初期化（空っぽにする）
    $_SESSION = [];

    //Cookieに保存してある"SessionIDの保存期間を過去にして破棄
    if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
        setcookie(session_name(), '', time() - 42000, '/');
    }

    // セッションを破棄
    session_destroy();

    // ログインページにリダイレクト
    header("Location: login.php");
    exit();
} else {
    // POSTリクエストでない場合はエラーメッセージを表示
    echo ("不正なアクセスです");
}
?>