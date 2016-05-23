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
$id = $_POST["id"];

//3.削除処理
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:a1");
$stmt->bindValue(':a1', $id);
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
