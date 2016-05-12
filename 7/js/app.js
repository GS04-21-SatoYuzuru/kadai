<?php
    //言語設定、内部エンコーディングを指定する
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    mb_http_output("UTF-8");

    //2. DB接続します
    $pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', 'root');

    //２．データ登録SQL作成
    $stmt_count_blood_a = $pdo->prepare("select count(blood) from an_table where bloo like 'A';");

    //３．SQL実行
    $flag_count_blood_a = $stmt->execute();

    $result_count_blood_a = $stmt->fetch(PDO::FETCH_ASSOC);
?>

var count_blood_a = <?= $flag_count_blood_a ?>
    //チャート用データ
var dataPlot = [
    {
        label: "A",
        y: count_blood_a
    },
    {
        label: "オレンジ",
        y: 15
    },
    {
        label: "バナナ",
        y: 25
    },
    {
        label: "マンゴー",
        y: 30
    },
    {
        label: "グレープ",
        y: 28
    }
];
//========================================

//チャートの生成
var chart = new CanvasJS.Chart("chartContainer_blood", {
    data: [{
        type: 'column',
        dataPoints: dataPlot
    }]
});
chart.render();
