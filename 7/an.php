<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>アンケート</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ResetCSS -->
    <link href="css/reset.css" rel="stylesheet">
    <!-- jQueryMobileCSS   -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>

    <!-- アンケートページ -->
    <div data-role="page" id="an">
        <div data-role="header">
            <h1>アンケート</h1>
        </div>
        <div data-role="content">
            <p>アンケートにお答え下さい！</p>
            <form action="confirm.php" method="post">
                <div data-role="fieldcontain">
                    <label for="name">ニックネーム</label>
                    <input type="text" name="name" id="name" value="" required>
                </div>

                <div data-role="fieldcontain">
                    <label for="age">年齢</label>
                    <input type="range" name="age" min="0" max="100" id="age" value="20">
                    <p>(秘密にしたい方は「0」に...)</p>
                </div>

                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup" data-type="horizontal">
                        <legend>血液型</legend>
                        <input type="radio" name="blood" value="1" id="blood_1" checked="checked">
                        <label for="blood_1">A</label>
                        <input type="radio" name="blood" value="2" id="blood_2">
                        <label for="blood_2">B</label>
                        <input type="radio" name="blood" value="3" id="blood_3">
                        <label for="blood_3">AB</label>
                        <input type="radio" name="blood" value="4" id="blood_4">
                        <label for="blood_4">O</label>
                        <input type="radio" name="blood" value="5" id="blood_5">
                        <label for="blood_5">その他</label>
                        <input type="radio" name="blood" value="6" id="blood_6">
                        <label for="blood_6">不明</label>
                    </fieldset>
                </div>

                <div data-role="fieldcontain">
                    <label for="starSign">星座</label>
                    <select name="starSign" id="star" data-native-menu="false">
                        <option value="1" selected>やぎ座</option>
                        <option value="2">みずがめ座</option>
                        <option value="3">うお座</option>
                        <option value="4">おひつじ座</option>
                        <option value="5">おうし座</option>
                        <option value="6">ふたご座</option>
                        <option value="7">かに座</option>
                        <option value="8">しし座</option>
                        <option value="9">おとめ座</option>
                        <option value="10">てんびん座</option>
                        <option value="11">さそり座</option>
                        <option value="12">いて座</option>
                    </select>
                </div>

                <input type="submit" value="送信" data-role="button" data-inline="true">
            </form>
            <p><a href="index.php" data-role="button" data-icon="home">ホームへ</a></p>
        </div>
        <div data-role="footer">
            <h4>Copyright 2016</h4>
        </div>
    </div>

</body>

</html>
