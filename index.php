<?php
    if (isset($_COOKIE["user_name"])) {
        print "<p>";
        print "ログインユーザー：".$_COOKIE["user_name"];
        print "</p>";
        $user_name=$_COOKIE["user_name"];
    }
?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
    <ul>
        <?php
            if (isset($_COOKIE["user_name"])){
                //ログイン済みの場合ログアウトのリンクを貼る
                echo "<li><a href=logout.php>ログアウト</a></li>";

                //ログイン済みの場合購入履歴を読み込むリンクを貼る
                echo "<li><a href=read.php>購入履歴を読み込む</a></li>";

                //ログイン済みの場合ショッピングのリンクを張る
                echo "<li><a href=shopping.php>購入を行う</a></li>";
            }else{
                //ログイン前なら新規ユーザ登録のリンクを貼る
                echo "<li><a href=create_user.php>新規ユーザー登録</a></li>";

                //ログイン前ならログインのリンクを貼る
                echo "<li><a href=login.php>ログイン</a></li>";

            }
        ?>
    </ul>
</body>
</html>