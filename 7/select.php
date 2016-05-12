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

       <h1>星座</h1>
        <div id="chartContainer_age"></div>
        <!-- CanvasJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
        <script src="./js/app.js"></script>


    </main>

    <footer>
        <div>
            <ul>
                <li>

                </li>
            </ul>
        </div>
        <h4>Copyright 2016</h4>
    </footer>

</body>

</html>
