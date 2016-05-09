<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>確認</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ResetCSS -->
    <link href="css/reset.css" rel="stylesheet">
    <!-- jQueryMobileCSS   -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>

    <!-- 確認ページ -->
    <div data-role="page" id="confirm">
        <div data-role="header">
            <h1>確認</h1>
        </div>
        <div data-role="content">
            <p>この内容でよろしいですか？</p>
            <form action="insert.php" method="post">
                <input type="submit" value="はい" data-role="button" data-inline="true">
            </form>
            <p><a href="an.php" data-role="button" data-transition="flip" data-icon="back" data-inline="true">修正する</a></p>
            <p><a href="index.php" data-role="button" data-icon="home">ホームへ</a></p>
        </div>
        <div data-role="footer">
            <h4>Copyright 2016</h4>
        </div>
    </div>

</body>

</html>
