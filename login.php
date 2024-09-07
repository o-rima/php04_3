<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
<header>
    <nav>
        <a href="index.php">データ登録</a>
    </nav>
</header>    <fieldset>
    <div class="container">
    
    <legend>ログイン</legend>
        <form class="mainform" action="login_act.php" method="post">
            <div class="form-group">
                <label for="lid">ID</label>
                <input type="text" id="lid" name="lid" required placeholder="">
            </div>
            <div class="form-group">
                <label for="lpw">パスワード</label>
                <input type="password" id="lpw" name="lpw" required placeholder="">
            </div>
            <input type="submit" value="ログイン">
            
        </form>
    
    </div></fieldset>
</body>

</html>