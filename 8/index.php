<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>POSTデータ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button>
                        <a class="navbar-brand" href="select.php">データ一覧へ</a>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="container jumbotron">
            <fieldset>
                <div class="row">
                    <div class="col-sm-12">
                        <legend>フリーアンケート (新規)</legend>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label>名前：
                            <input type="text" name="name" placeholder="○○" required>
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label>Email：
                            <input type="email" name="email" placeholder="aaa@gmail.com" required>
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label>年齢：
                            <input type="text" name="age" placeholder="99" required>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label>
                            <textArea name="naiyou" rows="4" cols="40"></textArea>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" value="送信">
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
