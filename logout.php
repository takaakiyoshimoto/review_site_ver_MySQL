<?php
    // 有効期限に現在よりも前の時間を設定してクッキーを削除
    setcookie("user_name", "", time() - 60);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>ログアウト</title>
    </head>
    <body>
        <h1>ログアウトしました。</h1>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>
