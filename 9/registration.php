<?php
//1. HTML_STARTをインクルード
$title = "REGISTRATION"; //html_start.phpのtitleタグに表示
include("html_start.php");
?>

<header>
    <nav class="navbar navbar-default">新規登録</nav>
</header>
<form name="form1" action="insert_user.php" method="post">
    <input type="hidden" name="kanri_flg" value="0">
    <input type="hidden" name="life_flg" value="0">
    名前:<input type="text" name="name" required/>
    希望のID:<input type="text" name="lid" required/>
    希望のパスワード:<input type="password" name="lpw" required/>
    <input type="submit" value="登録" />
</form>

<div>
    <button><a href="login.php">戻る</a></button>
</div>

<?php
//2. HTML_ENDをインクルード
include("html_end.php");
?>
