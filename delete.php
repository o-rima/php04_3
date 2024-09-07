<?php
//1. POSTデータ取得
$id = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bookmark_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

// if ($status === false) {
//     $error = $stmt->errorInfo();
//     exit('SQLError:' . print_r($error, true));
// } else {
//     header('Location: select.php');
//     exit();
// }