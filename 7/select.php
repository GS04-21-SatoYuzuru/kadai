<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>集計結果</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ResetCSS -->
    <link href="css/reset.css" rel="stylesheet">
    <!-- MyCSS -->
    <link href="css/mycss1.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
    <header>
        <div>
            <h1>集計結果</h1>
        </div>
    </header>

    <!-- 集計結果ページ -->
    <main>
        <div id="to_home">
            <button><a href="index.html">ホームへ</a></button>
        </div>

        <div id="total_id"></div>
        <div id="chartContainer_blood"></div>
        <div id="chartContainer_star"></div>

        <!-- CanvasJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
        <script>
            window.onload = function () {
                /*===== トータル人数 =====*/
                var count_total_id = 100;
                $("#total_id").html("今までに " + count_total_id + " 人のアンケート回答がありました。");

                /*=========================*/


                /*===== 血液型チャート =====*/
                var count_blood_a = 20;
                var count_blood_b = 5;
                var count_blood_ab = 7;
                var count_blood_o = 15;
                var count_blood_other = 3;
                var count_blood_unknown = 1;

                var chart_blood = new CanvasJS.Chart("chartContainer_blood", {
                    title: {
                        text: "血液型チャート"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [
                        {
                            type: "pie",
                            showInLegend: true,
                            legendText: "{indexLabel}",
                            dataPoints: [
                                {
                                    y: count_blood_a,
                                    indexLabel: "A"
                                },
                                {
                                    y: count_blood_b,
                                    indexLabel: "B"
                                },
                                {
                                    y: count_blood_ab,
                                    indexLabel: "AB"
                                },
                                {
                                    y: count_blood_o,
                                    indexLabel: "O"
                                },
                                {
                                    y: count_blood_other,
                                    indexLabel: "その他"
                                },
                                {
                                    y: count_blood_unknown,
                                    indexLabel: "不明"
                                }
                            ]
                        }
                    ]
                });
                chart_blood.render();
                /*=========================*/
                /*===== 星座チャート =====*/
                var count_star_yagi = 1;
                var count_star_mizugame = 3;
                var count_star_uo = 5;
                var count_star_ohitsuji = 3;
                var count_star_oushi = 7;
                var count_star_futago = 5;
                var count_star_kani = 8;
                var count_star_shishi = 4;
                var count_star_otome = 1;
                var count_star_tenbin = 6;
                var count_star_sasori = 3;
                var count_star_ite = 1;

                var chart_star = new CanvasJS.Chart("chartContainer_star", {
                    title: {
                        text: "星座チャート"
                    },
                    data: [
                        {
                            type: "doughnut",
                            dataPoints: [
                                {
                                    y: count_star_yagi,
                                    indexLabel: "やぎ座"
                                },
                                {
                                    y: count_star_mizugame,
                                    indexLabel: "みずがめ座"
                                },
                                {
                                    y: count_star_uo,
                                    indexLabel: "うお座"
                                },
                                {
                                    y: count_star_ohitsuji,
                                    indexLabel: "おひつじ座"
                                },
                                {
                                    y: count_star_oushi,
                                    indexLabel: "おうし座"
                                },
                                {
                                    y: count_star_futago,
                                    indexLabel: "ふたご座"
                                },
                                {
                                    y: count_star_kani,
                                    indexLabel: "かに座"
                                },
                                {
                                    y: count_star_shishi,
                                    indexLabel: "しし座"
                                },
                                {
                                    y: count_star_otome,
                                    indexLabel: "おとめ座"
                                },
                                {
                                    y: count_star_tenbin,
                                    indexLabel: "てんびん座"
                                },
                                {
                                    y: count_star_sasori,
                                    indexLabel: "さそり座"
                                },
                                {
                                    y: count_star_ite,
                                    indexLabel: "いて座"
                                },
                            ]
                        }
                    ]
                });
                chart_star.render();
                /*=========================*/
            }
        </script>
    </main>

    <footer>
        <h4>Copyright 2016</h4>
    </footer>

</body>

</html>
