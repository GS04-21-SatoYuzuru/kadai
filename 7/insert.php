<?php
    //1. POSTデータ取得（）
    $name = $_POST["name"];
    $age = $_POST["age"];
    $blood = $_POST["blood"];
    $star = $_POST["star"];

    //2. DB接続します
$pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', 'root');

    //３．データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO an_table (id, name, age, blood, star, indate )VALUES(NULL, :name, :age, :blood, :star, sysdate())");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':age', $age);
    $stmt->bindValue(':blood', $blood);
    $stmt->bindValue(':star', $star);
    $status = $stmt->execute();

    //４．データ登録処理後
    if($status==false) {
        //Errorの場合$status=falseとなり、エラー表示
        echo "SQLエラー";
        exit;
    } else {
        //５．finish.htmlへリダイレクト
        header('Location: finish.html');
        exit;
    }
?>
