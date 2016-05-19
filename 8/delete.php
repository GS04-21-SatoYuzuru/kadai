<?php
//1.POSTでParamを取得
$id = $_POST["id"];

//2.DB接続など
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

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
    //５．index.phpへリダイレクト
    header("Location: select.php");
    exit;
}
?>