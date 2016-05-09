<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>アンケートシステム課題</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ResetCSS -->
    <link href="css/reset.css" rel="stylesheet">
    <!-- jQueryMobileCSS   -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>

    <!-- トップページ -->
    <div data-role="page" id="home">
        <div data-role="header">
            <h1>ホーム</h1>
        </div>
        <div data-role="content">
            <p><a href="an.php" data-transition="flow" data-role="button" data-icon="edit">アンケートに応える</a></p>
            <p><a href="result.php" data-transition="pop" data-role="button" data-icon="check">集計結果を見る</a></p>
        </div>
        <div data-role="footer">
            <h4>Copyright 2016</h4>
        </div>
    </div>

</body>

</html>
