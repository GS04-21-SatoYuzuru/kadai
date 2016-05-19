<?php
//1.GETでidを取得
$id = $_GET["id"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:a1");
$stmt->bindValue(':a1', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

// 1レコード分だけの場合
$result = $stmt->fetch();

?>
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>POSTデータ登録</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }
        </style>
    </head>

    <body>

        <!-- Head[Start] -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button>
                            <a class="navbar-brand" href="select.php">←戻る</a>
                        </button>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <form method="post" action="update.php">
            <div class="container jumbotron">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-12">
                            <legend>フリーアンケート (修正)</legend>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?=$result["id"]?>">

                    <div class="row">
                        <div class="col-sm-12">
                            <label>名前：
                                <input type="text" name="name" value="<?=$result["name"]?>">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Email：
                                <input type="email" name="email" value="<?=$result["email"]?>">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>年齢：
                                <input type="text" name="age" value="<?=$result["age"]?>">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>
                                <textArea name="naiyou" rows="4" cols="40">
                                    <?=$result["naiyou"]?>
                                </textArea>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" value="更新">
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>

        <!-- 削除ボタン-->
        <form method="post" action="delete.php">
            <div class="container jumbotron">
                <fieldset>
                    <input type="hidden" name="id" value="<?=$result["id"]?>">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" value="このユーザー情報を削除">
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
        <!-- Main[End] -->

    </body>

    </html>
