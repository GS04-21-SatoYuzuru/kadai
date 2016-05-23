<?php
/************************************************************
 *  ログイン認証OKの場合表示
 ************************************************************/
//SESSION開始
session_start();
include("func.php");

//セッションチェック(前ページのSESSION＿IDと現在のsession_idを比較)
sessionCheck(); //func.php

//DB接続します
$pdo = db();//func.php

//1.POSTでParamを取得
$id   = $_POST["id"];
$name   = $_POST["name"];
$email  = $_POST["email"];
$age = $_POST["age"];
$naiyou = $_POST["naiyou"];

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE gs_an_table SET name=:a1, email=:a2, age=:a3, naiyou=:a4, indate=sysdate() WHERE id=:a5");
$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $email);
$stmt->bindValue(':a3', $age);
$stmt->bindValue(':a4', $naiyou);
$stmt->bindValue(':a5', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    //５．select.phpへリダイレクト
    header("Location: select.php");
    exit;
}
?>
