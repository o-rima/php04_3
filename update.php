<?php

//1. POSTデータ取得
$book_name = $_POST['book_name'];
$book_url = $_POST['book_url'];
$book_comment = $_POST['book_comment'];
$id = $_POST['id'];// これ大事！ input type="hidden"

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_bookmark_table SET book_name = :book_name, book_url = :book_url, book_comment = :book_comment, date = sysdate() WHERE id = :id;');
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);// 数値の場合 PDO::PARAM_INT

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}