<?php
session_start();
include('func.php'); //外部ファイル読み込み（関数群の予定）

//1. 接続します


//入力チェック(受信確認処理追加)
if(
    !isset($_POST["lid"]) || $_POST["lid"]=="" ||
    !isset($_POST["lpw"]) || $_POST["lpw"]==""
){
    exit('ParamError');
}

//1. POSTデータ取得
$lid   = $_POST["lid"];
$lpw  = $_POST["lpw"];
$name = $_POST["name"];
$kanri_flg  = $_POST["kanri_flg"];
$life_flg  = $_POST["life_flg"];

//2. DB接続します(エラー処理追加)
$pdo = db();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg)VALUES(NULL, :a1, :a2, :a3, :a4, :a5)");
$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $lid);
$stmt->bindValue(':a3', $lpw);
$stmt->bindValue(':a4', $kanri_flg);
$stmt->bindValue(':a5', $life_flg);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    //５．login.phpへリダイレクト
    header("Location: login.php");
    exit;
}
?>
