<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>山手線ヒートマップ 入力側</title>
    <!-- ResetCSS -->
    <link href="css/reset.css" rel="stylesheet">
</head>

<body>

    <form method="post" action="output_data.php">
        <ul>
            <li>
                駅名
            </li>
            <li>
                <select name="station" required>
                    <option value=""></option>
                    <option value="tokyo">東京</option>
                    <option value="yurakucho">有楽町</option>
                    <option value="shinbashi">新橋</option>
                    <option value="hamamatsucho">浜松町</option>
                    <option value="tamachi">田町</option>
                    <option value="shinagawa">品川</option>
                    <option value="osaki">大崎</option>
                    <option value="gotanda">五反田</option>
                    <option value="meguro">目黒</option>
                    <option value="ebisu">恵比寿</option>
                    <option value="shibuya">渋谷</option>
                    <option value="harajuku">原宿</option>
                    <option value="yoyogi">代々木</option>
                    <option value="shinjuku">新宿</option>
                    <option value="shinokubo">新大久保</option>
                    <option value="takadanobaba">高田馬場</option>
                    <option value="mejiro">目白</option>
                    <option value="ikebukuro">池袋</option>
                    <option value="otsuka">大塚</option>
                    <option value="sugamo">巣鴨</option>
                    <option value="komagome">駒込</option>
                    <option value="tabata">田端</option>
                    <option value="nishinippori">西日暮里</option>
                    <option value="uguisudani">鶯谷</option>
                    <option value="ueno">上野</option>
                    <option value="okachimachi">御徒町</option>
                    <option value="akihabara">秋葉原</option>
                    <option value="kanda">神田</option>
                </select>
            </li>
            <li>
                混み具合
            </li>
            <li>
                <select name="trafficy_level" required>
                    <option value=""></option>
                    <option value="1">座れる</option>
                    <option value="2">座れない</option>
                    <option value="3">つり革が空いている</option>
                    <option value="4">つり革が空いていない</option>
                    <option value="5">動けない</option>
                </select>
            </li>
            <li>
                <p>
                    <input type="submit" value="送信">
                </p>
            </li>
        </ul>

    </form>

</body>

</html>
