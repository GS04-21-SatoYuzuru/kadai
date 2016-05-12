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

        <div id="chartContainer_blood"></div>

        <!-- CanvasJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
        <!--<script src="./js/app.js"></script>-->
        <script>
            window.onload = function () {

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
            }
        </script>
    </main>

    <footer>
        <h4>Copyright 2016</h4>
    </footer>

</body>

</html>
